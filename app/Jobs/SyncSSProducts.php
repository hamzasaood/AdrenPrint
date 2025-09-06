<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncSSProducts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;

    public function handle(): void
{
    $stylesRes = Http::withBasicAuth(env('SS_ACCOUNT_NUMBER'), env('SS_API_KEY'))
        ->get('https://api.ssactivewear.com/v2/styles/', [
            'fields'    => 'StyleID,BrandName,PartNumber,StyleName',
            'mediatype' => 'json',
        ]);

    if ($stylesRes->failed()) {
        Log::error('SS Styles fetch failed: ' . $stylesRes->body());
        return;
    }

    $styles = $stylesRes->json();

    foreach ($styles as $style) {
        $styleId   = $style['StyleID'] ?? null;
        $brandName = $style['BrandName'] ?? null;
        $styleName = $style['StyleName'] ?? ($style['PartNumber'] ?? null);

        if (!$styleId) continue;

        // Dispatch one job per style
        \App\Jobs\SyncSSStyleProducts::dispatch($styleId, $brandName, $styleName);

        Log::info("Dispatched SyncSSStyleProducts for StyleID {$styleId}");
    }
}

}
