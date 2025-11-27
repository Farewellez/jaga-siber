<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Incoming Reports') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 border border-gray-700 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-100">
                    
                    @if($reports->isEmpty())
                        <p class="text-gray-400 text-center py-4">No reports yet. Good news!</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full leading-normal">
                                <thead>
                                    <tr>
                                        <th class="px-5 py-3 border-b border-gray-600 bg-gray-700 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Bug Title</th>
                                        <th class="px-5 py-3 border-b border-gray-600 bg-gray-700 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Program</th>
                                        <th class="px-5 py-3 border-b border-gray-600 bg-gray-700 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Severity</th>
                                        <th class="px-5 py-3 border-b border-gray-600 bg-gray-700 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Hunter</th>
                                        <th class="px-5 py-3 border-b border-gray-600 bg-gray-700 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Evidence</th>
                                        <th class="px-5 py-3 border-b border-gray-600 bg-gray-700 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reports as $report)
                                    <tr class="hover:bg-gray-700 transition-colors">
                                        <td class="px-5 py-5 border-b border-gray-700 bg-gray-800 text-sm">
                                            <p class="text-white font-bold">{{ $report->title }}</p>
                                            <p class="text-gray-400 text-xs">{{ Str::limit($report->description, 50) }}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-700 bg-gray-800 text-sm">
                                            <span class="inline-block bg-gray-600 rounded-full px-3 py-1 text-xs font-semibold text-gray-200">
                                                {{ $report->program->title }}
                                            </span>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-700 bg-gray-800 text-sm">
                                            <span class="
                                                @if($report->severity == 'critical') text-red-400 font-bold
                                                @elseif($report->severity == 'high') text-orange-400 font-bold
                                                @else text-gray-300 
                                                @endif uppercase text-xs">
                                                {{ $report->severity }}
                                            </span>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-700 bg-gray-800 text-sm text-gray-300">
                                            {{ $report->hunter->name }}
                                            <br><span class="text-xs text-gray-500">@ {{ $report->hunter->username }}</span>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-700 bg-gray-800 text-sm">
                                            @if($report->attachment_path)
                                                <a href="{{ route('attachments.download', $report) }}" class="text-indigo-400 hover:text-indigo-300 underline text-xs">
                                                    Download Proof
                                                </a>
                                            @else
                                                <span class="text-gray-600 text-xs">No File</span>
                                            @endif
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-700 bg-gray-800 text-sm">
                                            <form action="{{ route('reports.update-status', $report) }}" method="POST">
                                                @csrf @method('PATCH')
                                                <select name="status" onchange="this.form.submit()" class="text-xs bg-gray-900 border-gray-600 text-gray-300 rounded shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                                    <option value="new" {{ $report->status == 'new' ? 'selected' : '' }}>New</option>
                                                    <option value="triaged" {{ $report->status == 'triaged' ? 'selected' : '' }}>Triaged</option>
                                                    <option value="accepted" {{ $report->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                                    <option value="rejected" {{ $report->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                    <option value="resolved" {{ $report->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                                                    <option value="paid" {{ $report->status == 'paid' ? 'selected' : '' }}>Paid</option>
                                                </select>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>