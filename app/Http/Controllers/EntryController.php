<?php
namespace App\Http\Controllers;
use App\Models\Entry;

class EntryController extends Controller
{
    public function index()
    {
        $stats = [
            'pending' => Entry::pending()->count(),
            'approved' => Entry::approved()->count(),
            'total' => Entry::count(),
        ];
        $entries = Entry::latest()->paginate(20);
        return view('entries.index', compact('entries', 'stats'));
    }
    
    public function approve(Entry $entry)
    {
        $entry->update(['status' => 'approved', 'approved_at' => now()]);
        return back()->with('success', 'Entry approved.');
    }
    
    public function reject(Entry $entry)
    {
        $entry->update(['status' => 'rejected']);
        return back()->with('success', 'Entry rejected.');
    }
    
    public function destroy(Entry $entry)
    {
        $entry->delete();
        return back()->with('success', 'Entry deleted.');
    }
}
