<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Marketplace;
use App\Models\Service;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'users' => User::all(),
            'categories' => Category::all(),
            'products' => Marketplace::all(),
            'services' => Service::all(),
            'posts' => Post::all(),
        ]);
    }

    public function banUser(User $user)
    {
        $user->is_banned = true;
        $user->save();
        return back()->with('success', 'User banned.');
    }

    public function unbanUser(User $user)
    {
        $user->is_banned = false;
        $user->save();
        return back()->with('success', 'User unbanned.');
    }

    public function addCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:32',
            'icon' => 'required|string|max:64',
        ]);
        Category::create([
            'name' => $request->name,
            'color' => $request->color,
            'icon' => $request->icon,
        ]);
        return back()->with('success', 'Category added.');
    }

    public function removeCategory(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Category removed.');
    }

    public function removeProduct(Marketplace $product)
    {
        $product->delete();
        return back()->with('success', 'Product removed.');
    }

    public function removeService(Service $service)
    {
        $service->delete();
        return back()->with('success', 'Service removed.');
    }

    public function removePost(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post removed.');
    }
}
