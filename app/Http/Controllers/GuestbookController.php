<?php
namespace App\Http\Controllers;
use App\Models\Entry;
use App\Http\Requests\EntryRequest;

class GuestbookController extends Controller
{
    public function index()
    {
        $entries = Entry::approved()->latest('approved_at')->paginate(10);
        return view('guestbook.index', compact('entries'));
    }
    
    public function create() { return view('guestbook.create'); }
    
    public function store(EntryRequest $request)
    {
        Entry::create($request->validated());
        return redirect()->route('guestbook.index')->with('success', 'Thank you! Your message is pending approval.');
    }
}
