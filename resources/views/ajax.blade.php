{{$i=1}}
@foreach($shop as $item)
<tr>
<td>{{$i++}}</td>
<td>{{$item->name}}</td>
<td>{{$item->city}}</td>
<td><button class="btn btn-success edit" value='{{$item->id}}' >edit </button>
&nbsp;<button class="btn btn-danger delete" value='{{$item->id}}' >delete</button></td>
 </tr>
 @endforeach