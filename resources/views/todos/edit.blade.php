@extends('layouts.app')

@section('title', 'ToDo新規作成')

@section('content')
<@section('content') <div class="max-w-2xl mx-auto">
        <h2 class="text-xl font-semibold text-slate-700 mb-6">ToDo新規作成</h2>

        @include('todos._form', [
            'action' => route('todos.update', $todo),
            'cancel' => route('todos.show', $todo),
            'submit' => '更新',
            'method' => 'PUT',
        ])
        </div>
    @endsection
@endsection
