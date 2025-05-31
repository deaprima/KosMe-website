<?php

namespace App\Http\Controllers;

use App\Services\MidtransService;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    protected $midtransService;

    public function __construct(MidtransService $midtransService)
    {
        $this->midtransService = $midtransService;
    }

    public function notification(Request $request)
    {
        $payload = $request->all();

        try {
            $transaction = $this->midtransService->handleCallback((object) $payload);
            return response()->json(['status' => 'success', 'message' => 'Payment notification processed']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }
}
