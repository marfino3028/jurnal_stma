<table class="table">
@foreach ($catalog->catalog_metadata_value as $item)
<tr>
    <th class="col-md-2">{{$item->metadata->value}}</th>
    <td class="col-md-4">{{$item->value}}</td>
</tr>    
@endforeach
<tr>
    <th class="col-md-2"> 
        Cover
    </th>
    <td class="col-md-4">
        <a href="{{ asset('catalogs/cover'.$catalog->cover) }}">
            <i class="fa fa-download"></i> Download
        </a>
    </td>
</tr>
<tr>
    <th class="col-md-2"> 
        Full
    </th>
    <td class="col-md-4">
        <a href="{{ asset('catalogs/cover'.$catalog->full) }}">
            <i class="fa fa-download"></i> Download
        </a>
    </td>
</tr>
<tr>
    <th class="col-md-2"> 
        User
    </th>
    <td class="col-md-4">
        {{$catalog->user->name}}
    </td>
</tr>
<tr>
    <th class="col-md-2"> 
        Date Upload
    </th>
    <td class="col-md-4">
        {{$catalog->created_at}}
    </td>
</tr>
<tr>
    <th class="col-md-2"> 
        Category
    </th>
    <td class="col-md-4">
        {{$catalog->category->name}}
    </td>
</tr>
<tr>
    <th class="col-md-2"> 
        Status
    </th>
    <td class="col-md-4">
        @if ($catalog->status==1)
            <span class="label-success label">Approved</span>
        @else
            <span class="label-warning label">Draft</span>
        @endif
    </td>
</tr>
</table>

