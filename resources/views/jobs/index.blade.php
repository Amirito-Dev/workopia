<x-layout>
<h1>Available Jobs</h1>
<ul>
    @forelse($jobs as $job)
        <li>{{$loop->index}} - {{$job}}</li>
    @empty
        <li>No jobs available</li>
    @endforelse
</ul>
</x-layout>