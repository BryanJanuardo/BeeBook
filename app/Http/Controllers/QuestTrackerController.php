<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\QuestTracker;
use Illuminate\Http\Request;

class QuestTrackerController extends Controller
{
    public function index() {
        // Fetch all quest trackers from the database
        $questTrackers = QuestTracker::all();

        // Return a view with the quest trackers data
        return view('quest_trackers.index', compact('questTrackers'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'QuestAvailable' => 'required|boolean',
            'UserID' => 'required|exists:users,UserID',
            'QuestProgress' => 'required|integer',
        ]);

        $questTracker = QuestTracker::create($validated);

        return response()->json($questTracker, 201);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'QuestProgress' => 'required|integer',
            'QuestCompletedDate' => 'nullable|date',
        ]);

        $questTracker = QuestTracker::findOrFail($id);
        $questTracker->update($validated);

        return response()->json($questTracker, 200);
    }
}
