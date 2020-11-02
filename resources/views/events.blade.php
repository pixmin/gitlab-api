@extends('layouts.app')

@section('title', 'Events for ' . $user['name'] . ' (' . $user['username'] . ')')

@section('content')
    <table>
        <thead>
        <tr>
            <th>Date</th>
            <th>Heure</th>
            <th>Event</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($events as $event)
            @if (empty($event['push_data']) || $event['push_data']['ref_type'] != 'tag')
            <tr>
                <td>{{ date('d/m/Y', strtotime($event['created_at'])) }}</td>
                <td>{{ date('H:i', strtotime($event['created_at'])) }}</td>
                <td>
                    @if ($event['target_title'])
                        {{ $event['target_title'] }}
                    @else
                        {{ $event['push_data']['commit_title'] }}
                    @endif
                </td>
            </tr>
            {{--
            <tr><td><pre>@php var_dump($event) @endphp</pre></td></tr>
            --}}
            @endif
        @endforeach
        </tbody>
    </table>
@endsection
