@extends('layouts.app')

@section('title', 'ToDo詳細')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('todos.index') }}"
                class="inline-flex items-center text-sm text-slate-500 hover:text-slate-800 transition">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                一覧に戻る
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm ring-1 ring-slate-200 overflow-hidden">
            {{-- ヘッダー: 作成日・更新日 + ステータスバッジ --}}
            <div class="px-8 py-4 border-b border-slate-100 flex items-center justify-between">
                <div class="flex gap-6 text-xs text-slate-500">
                    <div>
                        <span class="text-slate-400">作成</span>
                        <span class="ml-1 font-medium text-slate-600">{{ $todo->created_at->format('Y/m/d H:i') }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400">更新</span>
                        <span class="ml-1 font-medium text-slate-600">{{ $todo->updated_at->format('Y/m/d H:i') }}</span>
                    </div>
                </div>

                <span @class([
                    'inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold ring-1',
                    'bg-slate-50 text-slate-600 ring-slate-200' => $todo->status === '未着手',
                    'bg-amber-50 text-amber-700 ring-amber-200' => $todo->status === '進行中',
                    'bg-emerald-50 text-emerald-700 ring-emerald-200' =>
                        $todo->status === '完了',
                ])>
                    <span @class([
                        'w-1.5 h-1.5 rounded-full',
                        'bg-slate-400' => $todo->status === '未着手',
                        'bg-amber-500' => $todo->status === '進行中',
                        'bg-emerald-500' => $todo->status === '完了',
                    ])></span>
                    {{ $todo->status }}
                </span>
            </div>

            {{-- 本体 --}}
            <div class="px-8 py-7 space-y-6">
                {{-- タイトル --}}
                <h1 class="text-2xl font-bold text-slate-900 tracking-tight leading-snug">
                    {{ $todo->title }}
                </h1>

                {{-- 開始日・完了日 --}}
                <div class="grid grid-cols-2 gap-3">
                    <div class="bg-slate-50 rounded-xl px-4 py-3">
                        <div class="text-xs text-slate-500 mb-0.5">開始日</div>
                        <div class="text-base font-semibold text-slate-800 tabular-nums">
                            {{ $todo->started_at?->format('Y/m/d') ?? '—' }}
                        </div>
                    </div>
                    <div class="bg-slate-50 rounded-xl px-4 py-3">
                        <div class="text-xs text-slate-500 mb-0.5">完了日</div>
                        <div class="text-base font-semibold text-slate-800 tabular-nums">
                            {{ $todo->completed_at?->format('Y/m/d') ?? '—' }}
                        </div>
                    </div>
                </div>

                {{-- 詳細 --}}
                <div>
                    <div class="text-xs text-slate-500 mb-2">詳細</div>
                    <div class="text-slate-700 leading-relaxed whitespace-pre-wrap wrap-break-word">{{ $todo->description ?? '—' }}</div>
                </div>
            </div>
            {{-- アクション --}}
            <div class="px-8 py-4 bg-slate-50 border-t border-slate-100 flex justify-end gap-2">
                <a href="{{ route('todos.edit', $todo) }}"
                     class="px-4 py-2 text-sm font-medium bg-slate-900 hover:bg-slate-800 text-white rounded-lg transition">
                      編集
                  </a>
            </div>
        </div>
    </div>
@endsection
