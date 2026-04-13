@extends('layouts.app')

@section('title', 'ToDo一覧')

@section('content')
    @if (session('success'))
        <div class="bg-green-50 border border-green-300 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold text-gray-700">ToDo一覧</h2>
        <a href="{{ route('todos.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            + 新規作成
        </a>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">作成日</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">タイトル</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">ステータス</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">開始日</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">完了日</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($todos as $todo)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-gray-600">{{ $todo->created_at->format('Y-m-d') }}</td>
                        <td class="px-6 py-4">
                           <a href="{{ route('todos.show', $todo )}}" class="text-blue-600 hover:underline">{{ $todo->title }}</a>
                        </td>
                        <td class="px-6 py-4">
                            <span @class([
                                'px-2 py-1 rounded text-xs font-semibold',
                                'bg-gray-200 text-gray-700' => $todo->status === '未着手',
                                'bg-yellow-200 text-yellow-800' => $todo->status === '進行中',
                                'bg-green-200 text-green-800' => $todo->status === '完了',
                            ])>
                                {{ $todo->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">{{ $todo->started_at?->format('Y-m-d') ?? '-' }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $todo->completed_at?->format('Y-m-d') ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                            ToDoがまだありません
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
