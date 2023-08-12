<!-- resources/views/user/profile/show.blade.php -->
@extends('layouts.master')

@section('content')
<div class="col-10 mx-auto mt-5">
    <div class="card">
        <div class="card-header">
            My Profile
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" value="{{ $user->name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">First Name</label>
                    <input type="text" class="form-control" id="name" value="{{ $user->fname }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Last Name</label>
                    <input type="text" class="form-control" id="name" value="{{ $user->lname }}" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
                </div>
                <!-- Add other profile information here -->
            </form>
        </div>
    </div>
</div>

@endsection
