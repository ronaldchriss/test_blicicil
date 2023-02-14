@extends('app')

@section('menu')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="test row">
                    <div class="col-lg-6 text-left">
                        <h5><b> Detail Transaction {{$name_customer}} </b></h5>
                    </div>
                    <div class="col-lg-6 text-right">
                       
                        @if($transaction_d != NULL || $transaction_d != '')
                        <a class="btn btn-outline-success mb-2" href="{{route('printNota', $code)}}" target="_blank">Print Invoice</a>
                        @endif
                        <a class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#AddUser"
                            data-whatever="@mdo" onclick="adddata();">Add Detail Transaction</a>
                    </div>
                </div>
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th class="no-content">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1
                        @endphp
                        @foreach ($transaction_d as $item)
                        
                        <tr>
                            <td>{{$item->product}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>@currency($item->price)</td>
                            <td>@currency($item->q_price)</td>
                            <td>
                                <a class="btn btn-sm btn-warning mb-2" data-toggle="modal" data-target="#AddUser"
                                    data-whatever="@mdo" onclick="fill({{$item->id}});">
                                    Edit
                                </a>
                                <a class="btn btn-sm btn-danger mb-2" onclick="destroy({{$item->id}})">
                                    Delete
                                </a>
                                
                            </td>
                        </tr>
                        
                        @php
                            $no++
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            </tbody>
            
            </table>
        </div>
    </div>

</div>

</div>

<div id="AddUser" class="modal fade show" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title-modal"></h5>
                <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </a>
            </div>
            <div class="modal-body">
                <form action="" id="form-transaction" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group mb-4">
                        <label for="inputState">Product Name</label>
                        <input type="hidden" class="form-control" id="transaction_id" placeholder="Apel" value="{{$code}}" name="transaction_id" required>
                        <input type="text" class="form-control" id="product" placeholder="Apel" name="product" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="inputState">Price / product</label>
                        <input type="number" class="form-control" id="price" placeholder="100000" name="price" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="inputState">Quantity</label>
                        <input type="number" class="form-control" id="quantity" placeholder="12" name="quantity" required>
                    </div>
                   
            </div>
            <div class="modal-footer md-button">
                <a class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection

@include('menu.js_trans_detail')
