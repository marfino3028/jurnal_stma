@extends('frontEnd.layout')

@section('content')
<style type="text/css">
    table {
        font-family: verdana, arial, sans-serif;
        font-size: 11px;
        color: #333333;
        border-width: 1px;
        border-color: #808080;
        border-collapse: collapse;
    }
    table th {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #FFA6A6;
        background-color: #808080;
        color: #ffffff;
    }
    table tr:hover td {
        cursor: pointer;
    }
    table tr:nth-child(even) td{
        background-color: #F7CFCF;
    }
    table td {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #FFA6A6;
        background-color: #ffffff;
    }
</style>
<h3><font color="blueocean" >Ini Judul ya </font></h3>
<hr>
 <table>
        <tr>
            <td><b>dc.contributor.advisor</b></td>            
            <td>Fino</td>            
        </tr>
        <tr>
            <td><b>dc.contributor.author</b></td>            
            <td>Hamzah</td>            
        </tr>
        <tr>
            <td><b>dc.date.accessioned</b></td>            
            <td>2019-05-13T07:54:57Z</td>            
        </tr>
        <tr>
            <td><b>dc.date.available</b></td>            
            <td>2019-05-13T07:54:57Z</td>            
        </tr>
        <tr>
            <td><b>dc.date.issued</b></td>            
            <td>2019</td>            
        </tr>
        <tr>
            <td><b>dc.identifier.url</b></td>            
            <td>ini link gan</td>            
        </tr>
        <tr>
            <td><b>dc.description.abstract</b></td>            
            <td>ini tulisannya panjang lho</td>            
            <td>id</td>            
        </tr>
        <tr>
            <td><b>dc.publisher</b></td>            
            <td>Bogor Agricultural University (IPB)</td>               
            <td>id</td>            
        </tr>
        <tr>
            <td><b>dc.subject.ddc</b></td>            
            <td>Aquaculture Catfish 2018</td>                
            <td>id</td>            
        </tr>
        <tr>
            <td><b>dc.title</b></td>            
            <td>ini judulnya lagi gan</td>            
            <td>id</td>            
        </tr>
        <tr>
            <td><b>dc.subject.keyword</b></td>            
            <td>bioflok Chlorella sp. Clarias gariepinus induk imunitas ketahanan larva</td>         
            <td>id</td>         
        </tr>
    </table>

    <table>
        <tr>
        <td><font color="blueocean" size="12px">Files In This Item </font></td>
        </tr>
        <tr>
        <td><img src="" width="200" height="300"></td>
        <td><br>
         <p><b>Name :</b> nama.pdf<br>
         <b>Ukuran :</b> angkaMb<br>
      <b>Format :</b> PDF<br>
        <b>Description :</b> Full Text
        </td></p>
        </tr>
        <tr>
         <td><a href="#"> View/Open</a></td>
         </tr>
    </table>
    <table>

        <tr>
        <td><font color="blueocean" size="12px">This item appears in the following Collection(s) </font></td>
        </tr>
        <tr>
        <td><ul><li>nama subcollectionnya gan</li></td>
        </tr>
        <tr>
        <td><a href="#">Show simple item record</a></td>
        </tr>

    </table>
</div>


@endsection