@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection
@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
    const monthNames = ["","Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
    ];
new Morris.Line({
    parseTime: false,
    element: 'myfirstchart',
    data: {!! json_encode($collection) !!},
    xkey: 'month',
    ykeys: ['value'],
    labels: ['Value'],
    xLabels: "month",
    xLabelFormat: function (x) {
            var index = parseInt(x.src.month);
            return monthNames[index];
        },
});
new Morris.Bar({
  element: 'secondchart',
  data: {!! json_encode($collection2) !!},
  xkey: 'label',
  ykeys: ['value'],
  labels: ['Series A']
});
</script>
@endsection
@section('content')

<div class="box-header dker">
<h5 class="m-b-0 _300">Hi <span class="text-primary">{{Auth::user()->name}}</span>, Welcome back</h5> <br><br>
    <h3>Laporan</h3>
    <small>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{!! route('home') !!}">Home</a>
            </li>
            <li class="breadcrumb-item active">Report</li>
     </ol>
    </small>
</div>
<div class="box-body row">
    @include('flash::message')   
    <div class="row">
        <div class="col-md-4">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Jumlah</th>
                    
                </tr>
                @foreach ($collection as $key=>$item)
                <tr>
                    <td>{!! $key+1!!}</td>
                    <td>{!! date('F', mktime(0, 0, 0, $item['month'], 10)); !!}</td>
                    <td>{!! $item['value'] !!}</td>
                </tr>
                @endforeach
            </table>
        </div>
       <div class="col-md-8">
           <div class="box">
               <div class="box-header">Grafik Total Koleksi</div>
               <div class="box-body" id="myfirstchart" style="height: 350px;"></div>
    
           </div>
       </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Katalog</th>
                    <th>Jumlah Data</th>
                    
                </tr>
                @foreach ($collection2 as $key=>$item)
                <tr>
                    <td>{!! $key+1!!}</td>
                    <td>{!! $item['label'] !!}</td>
                    <td>{!! $item['value'] !!}</td>
                </tr>
                @endforeach
            </table>
        </div>
           <div class="col-md-8">
            <div class="box">
                <div class="box-header">Per Katalog</div>
                <div class="box-body" id="secondchart" style="height: 350px;"></div>
            </div>
           </div>
        </div>

    <div class="row">
        <div class="col-md-4">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Katalog</th>
                    <th>Jumlah Download</th>
                    
                </tr>
                @foreach ($collection2 as $key=>$item)
                <tr>
                    <td>{!! $key+1!!}</td>
                    <td>{!! $item['label'] !!}</td>
                    <td>{!! $item['value'] !!}</td>
                </tr>
                @endforeach
            </table>
        </div>
           <div class="col-md-8">
            <div class="box">
                <div class="box-header">Per Katalog</div>
                <div class="box-body" id="thirdchart" style="height: 350px;"></div>
            </div>
           </div>
        </div>

    <div class="row">
        <div class="col-md-4">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Katalog</th>
                    <th>Jumlah View</th>
                    
                </tr>
                @foreach ($collection2 as $key=>$item)
                <tr>
                    <td>{!! $key+1!!}</td>
                    <td>{!! $item['label'] !!}</td>
                    <td>{!! $item['value'] !!}</td>
                </tr>
                @endforeach
            </table>
        </div>
           <div class="col-md-8">
            <div class="box">
                <div class="box-header">Per Katalog</div>
                <div class="box-body" id="fourthchart" style="height: 350px;"></div>
            </div>
           </div>
        </div>
    <div class="row">
        <div class="col-md-4">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Katalog</th>
                    <th>Jumlah Anggota</th>
                    
                </tr>
                @foreach ($collection2 as $key=>$item)
                <tr>
                    <td>{!! $key+1!!}</td>
                    <td>{!! $item['label'] !!}</td>
                    <td>{!! $item['value'] !!}</td>
                </tr>
                @endforeach
            </table>
        </div>
           <div class="col-md-8">
            <div class="box">
                <div class="box-header">Per Jenis Anggota</div>
                <div class="box-body" id="fivechart" style="height: 350px;"></div>
            </div>
           </div>
        </div>
    <div class="row">
        <div class="col-md-4">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Katalog</th>
                    <th>Jumlah Most Download</th>
                    
                </tr>
                @foreach ($collection2 as $key=>$item)
                <tr>
                    <td>{!! $key+1!!}</td>
                    <td>{!! $item['label'] !!}</td>
                    <td>{!! $item['value'] !!}</td>
                </tr>
                @endforeach
            </table>
        </div>
           <div class="col-md-8">
            <div class="box">
                <div class="box-header">Per Katalog</div>
                <div class="box-body" id="sixchart" style="height: 350px;"></div>
            </div>
           </div>
        </div>
    <div class="row">
        <div class="col-md-4">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Katalog</th>
                    <th>Jumlah Most View</th>
                    
                </tr>
                @foreach ($collection2 as $key=>$item)
                <tr>
                    <td>{!! $key+1!!}</td>
                    <td>{!! $item['label'] !!}</td>
                    <td>{!! $item['value'] !!}</td>
                </tr>
                @endforeach
            </table>
        </div>
           <div class="col-md-8">
            <div class="box">
                <div class="box-header">Per Katalog</div>
                <div class="box-body" id="sevenchart" style="height: 350px;"></div>
            </div>
           </div>
        </div>

    </div>
    
@endsection

