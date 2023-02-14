@extends('app')

@section('menu')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="test row">
                    <div class="col-lg-6 text-left">
                        <h5><b> Data Transaction </b></h5>
                    </div>
                    <div class="col-lg-6 text-right">
                        <a class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#AddUser"
                            data-whatever="@mdo" onclick="adddata();">Add Transaction</a>
                    </div>
                </div>
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name Customer</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Sum Price</th>
                            <th class="no-content">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1
                        @endphp
                        @foreach ($transaction as $item)
                        
                        <tr>
                            <td>{{$item->name_customer}}</td>
                            <td>{{$item->no_telp}}</td>
                            <td>{{$item->address}}</td>
                            <td>@currency($item->sum_price)</td>
                            <td>
                                <a class="btn btn-sm btn-warning mb-2" data-toggle="modal" data-target="#AddUser"
                                    data-whatever="@mdo" onclick="fill({{$item->id}});">
                                    Edit
                                </a>
                                <a class="btn btn-sm btn-danger mb-2" onclick="destroy({{$item->id}})">
                                    Delete
                                </a>
                                <a class="btn btn-sm btn-secondary mb-2"  href="{{route('transactionDetail', $item->id)}}">
                                    Detail
                                </a>
                                @if($item->sum_price != 0 || $item->sum_price != NULL || $item->sum_price != '')
                                <a class="btn btn-sm btn-success mb-2" target="_blank" href="{{route('printNota', $item->id)}}">
                                    Invoice
                                </a>
                                @endif
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
                        <label for="inputState">Name Customer</label>
                        <input type="text" class="form-control" id="name_customer" placeholder="Name" name="name_customer" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="inputState">Phone Customer</label>
                        <input type="text" class="form-control" id="no_telp" placeholder="0813xxxxx" name="no_telp" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="inputState">Address Customer</label>
                        <textarea class="form-control" name="address" id="address" cols="30" rows="2" required></textarea>
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

@include('menu.js_transaction')
