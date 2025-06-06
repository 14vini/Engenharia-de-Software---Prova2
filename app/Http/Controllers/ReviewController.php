<?php

namespace App\Http\Controllers;

use App\Services\ReviewService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function get()
    {
        return response()->json($this->reviewService->getAll());
    }

    public function details($id)
    {
        $review = $this->reviewService->getById($id);
        if (!$review) {
            return response()->json(['message' => 'Review não encontrada'], 404);
        }
        return response()->json($review);
    }

    public function store(Request $request)
    {
        $review = $this->reviewService->create($request->all());
        return response()->json($review, 201);
    }

    public function update(Request $request, $id)
    {
        $review = $this->reviewService->update($id, $request->all());
        if (!$review) {
            return response()->json(['message' => 'Review não encontrada'], 404);
        }
        return response()->json($review);
    }

    public function delete($id)
    {
        $review = $this->reviewService->delete($id);
        if (!$review) {
            return response()->json(['message' => 'Review não encontrada'], 404);
        }
        return response()->json(['message' => 'Review deletada com sucesso']);
    }
}