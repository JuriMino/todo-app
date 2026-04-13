@if ($errors->any())
    <div class="bg-red-50 border border-red-300 text-red-700 p-4 rounded mb-4">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $action }}" method="POST"
    class="bg-white shadow-sm ring-1 ring-slate-200 rounded-2xl p-6 space-y-4">
    @csrf
    @isset($method)
        @method($method)
    @endisset
    {{-- タイトル --}}
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">
            タイトル <span class="text-red-500">*</span>
        </label>
        <input type="text" name="title" value="{{ old('title', $todo->title ?? '') }}" maxlength="100"
            class="w-full border border-slate-300 rounded-lg shadow-sm p-2 focus:ring-2 focus:ring-slate-400 focus:outline-none">
    </div>

    {{-- ステータス --}}
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">
            ステータス <span class="text-red-500">*</span>
        </label>
        <select name="status"
            class="w-full border border-slate-300 rounded-lg shadow-sm p-2 focus:ring-2 focus:ring-slate-400 focus:outline-none">
            @foreach (['未着手', '進行中', '完了'] as $status)
                <option value="{{ $status }}"
                    {{ old('status', $todo->status ?? '') === $status ? 'selected' : '' }}>
                    {{ $status }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- 開始日・完了日 --}}
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">開始日</label>
            <input type="date" name="started_at"
                value="{{ old('started_at', $todo->started_at?->format('Y-m-d') ?? '') }}"
                class="w-full border border-slate-300 rounded-lg shadow-sm p-2 focus:ring-2 focus:ring-slate-400 focus:outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">完了日</label>
            <input type="date" name="completed_at"
                value="{{ old('completed_at', $todo->completed_at?->format('Y-m-d') ?? '') }}"
                class="w-full border border-slate-300 rounded-lg shadow-sm p-2 focus:ring-2 focus:ring-slate-400 focus:outline-none">
        </div>
    </div>

    {{-- 詳細 --}}
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">詳細</label>
        <textarea name="description" rows="4"
            class="w-full border border-slate-300 rounded-lg shadow-sm p-2 focus:ring-2 focus:ring-slate-400 focus:outline-none">{{ old('description', $todo->description ?? '') }}</textarea>
    </div>

    <div class="flex justify-end gap-2 pt-4">
        <a href="{{ $cancel }}"
            class="px-4 py-2 border border-slate-300 rounded-lg text-slate-700 hover:bg-slate-100">キャンセル</a>
        <button type="submit"
            class="px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-lg shadow">{{ $submit }}</button>
    </div>
</form>
