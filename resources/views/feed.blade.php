@include ('header')

<p>Hello, {{$user->name}}!</p>
@foreach($imageData as $data)
<tr>
    <td>{{$data->id}}</td>
    <td>
        <img src="{{ url('public/Photo/'.$data->photo) }}" style="height: 100px; width: 150px;">
    </td>
</tr>
@endforeach
@include ('footer')
