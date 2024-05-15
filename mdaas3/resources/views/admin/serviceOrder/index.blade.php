@extends('admin/layout')

@section('content')

<!-- Layout Content Start-->
<main>
    <div class="container-fluid px-4">
        <!-- <div class="d-flex justify-content-between mt-2 mr-2">
            <h1 class="mb-3">Food Category</h1>
        </div> -->

        <ol class="breadcrumb d-flex justify-content-between">
            <li class="breadcrumb-item active font-weight-bold">Service Order</li>
        </ol>

        <div class="row">
            <div class="col-md-5 col-xl-5 col-lg-5 h-50">
                <form class="card">
                    @csrf
                    <div class="form-group">
                        <label class="control-label font-weight-bold">Customer &nbsp<span style="color: red; font-size: 12px">*</span></label>
                        <select name="customer_id" id="customer_id" class=" form-control">
                            <option value="0">Please select customer</option>
                            @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('customer'))
                        <span class="text-danger">{{ $errors->first('customer') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label font-weight-bold">Food &nbsp<span style="color: red; font-size: 12px">*</span></label>
                        <select id="productlist" class=" form-control" onchange="preFillFoodDetails(event);">
                            <option value="0">Select food</option>
                            @foreach($foods as $food)
                            <option value="{{ $food->id }}" data-price="{{ $food->price }}">{{ $food->food_name }}/{{ $food->unit }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('food'))
                        <span class="text-danger">{{ $errors->first('food') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label font-weight-bold">Unit Price &nbsp<span style="color: red; font-size: 12px">*</span></label>
                            <input type="number" disabled id="price" value="{{ old('price') }}" step="0.01" class="form-control" min="0" placeholder="0" />
                            @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label font-weight-bold">Quantity &nbsp<span style="color: red; font-size: 12px">*</span></label>
                            <input type="number" id="qty" value="1" class="form-control" min="0" />
                            @if ($errors->has('qty'))
                            <span class="text-danger">{{ $errors->first('qty') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label font-weight-bold">Discount Type </label>
                            <select id="discount_type" class=" form-control">
                                <option value="0">N/A</option>
                                <option value="1">Flat</option>
                                <option value="2">Percentage</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label font-weight-bold">Discount </label>
                            <input type="number" id="discount" value="{{ old('discount') }}" step="0.01" class="form-control" min="0" placeholder="0" />
                            @if ($errors->has('discount'))
                            <span class="text-danger">{{ $errors->first('discount') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">

                        <button type="button" onclick="addItem(event)" class="btn btn-sm" style="background-color: #0f172b; color: #fff;">Add Item</button>
                    </div>
                </form>
            </div>
            <div class="col-md-7 col-md-7 col-xl-7 col-lg-7">
                <div class="card">
                    <div class="mb-4 mt-2" style="max-height:320px; overflow-y: scroll">
                        <table id="table" class="table table-stripped" style="max-height:320px; overflow-y: scroll">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Discount</th>
                                    <th>Subtotal</th>
                                    <th>?</th>
                                </tr>
                            </thead>
                            <tbody id="servicelist">
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-sm" onclick="tableData()" style="background-color: #0f172b; color: #fff;" id="order">Place Order</button>
                        <div class="m-1">
                            <strong>Total: </strong>
                            <span id="total">00.00 PKR</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </form> -->
        </div>
    </div>

</main>



<script type="text/javascript">
    window.$(document).ready(function() {
        $('#datatablesSimple').DataTable();
    });
</script>


<script>
    var food_id = 0;
    var serial = 1;
    var price = document.querySelector('#price');
    var discountType = document.querySelector('#discount_type');
    var discount = document.querySelector('#discount');
    var qty = document.querySelector('#qty');
    var customer_id = document.querySelector('#customer_id');

    // console.log("fasdf"+customer_id)

    var servicelist = document.querySelector('#servicelist');
    var productlist = document.querySelector('#productlist');

    var total = 0;

    function preFillFoodDetails(event) {
        target = event.target;

        if (target.value > 0) {
            price.value = target.querySelector('option[value="' + target.value + '"]').getAttribute('data-price');
            food_id = target.value;
            // discountType.value = 0;
            discount.value = 0.0;
            qty.value = 1.0;
        }
    }

    function addItem(event) {

        if (customer_id.selectedIndex == 0) {
            toastr.error('Please Select Customer');
        } else if (productlist.selectedIndex == 0) {
            toastr.error('Please Select a Food Item');
        } else {
            dis = 0;
            if (discountType.selectedIndex == 1) {
                dis = parseFloat(discount.value);
            } else if (discountType.selectedIndex == 2) {
                dis = parseFloat(price.value) * parseFloat(discount.value) / 100;
            } else {
                dis = 0;
            }

            subtotal = parseFloat(price.value) * parseFloat(qty.value);
            subtotal = subtotal - dis;
            subtotal = subtotal.toFixed(2);

            item = {
                serial: serial,
                food_id: food_id,
                name: productlist.querySelectorAll('option')[productlist.selectedIndex].textContent.trim(),
                price: parseFloat(price.value).toFixed(2),
                qty: parseInt(qty.value),
                discount: dis,
                subtotal: subtotal
            };


            var tr = document.createElement('tr');
            tr.innerHTML = foodItemHtml(item);
            servicelist.appendChild(tr);

            total = parseFloat(total) + parseFloat(subtotal);

            updateTotal();
            serial++;

            productlist.value = 0;
            price.value = 0;
            qty.value = 1;
            discountType.value = 0;
            discount.value = 0;
            
        }
    }

    function foodItemHtml(item) {
        // console.log(item);
        return "<td>" + item.serial + "<input style='display: none' name='food_id' value='" + item.food_id + "'></td>" +
            "<td style='display: none'>" + item.food_id + "</td>" +
            "<td>" + item.name + "<input type='hidden' name='order[]' value='" + item.name + "' ></td>" +
            "<td>" + item.price + "<input type='hidden' name='order[]' value='" + item.price + "' ></td>" +
            "<td>" + item.qty + "<input type='hidden' name='order[]' value='" + item.qty + "' ></td>" +
            "<td>" + item.discount + "<input type='hidden' name='discount' value='" + item.discount + "' ></td>" +
            "<td>" + item.subtotal + "<input type='hidden' name='order[" + (serial - 1) + "][subtotal]' value='" + item.subtotal + "' ></td>" +
            "<td><button type='button' onclick='deleteThis(event);' class='btn btn-xs btn-danger'>X</button></td>";
    }

    function deleteThis(event) {
        tr = event.target.parentNode.parentNode;
        subtotal = tr.querySelectorAll("input")[5];
        total = total - parseFloat(subtotal.value);
        updateTotal();
        tr.parentNode.removeChild(tr);
    }

    function updateTotal() {
        // console.log(total);
        document.querySelector('#total').innerHTML = parseFloat(total).toFixed(2) + " PKR <input type='hidden' name='total' value='" + parseFloat(total).toFixed(2) + "'>";
    }
</script>

<script type="text/javascript">
    function tableData() {
        var tableArray = [];

        var servicelist = document.querySelector('#servicelist');
        var customer = document.querySelector('#customer_id');
        var oTable = document.getElementById('table');
        var rowLength = oTable.rows.length;

        if (rowLength - 1 == 0) {
            toastr.error('Please Add Food Items');
        } else {
            $('#servicelist tr').each(function(index, tr) {
                var lines = $('td', tr).map(function(index, td) {
                    return $(td).text();
                });
                tableArray.push(lines);
            });
            var data = {
                    "_token": "{{ csrf_token() }}",
                    data: JSON.stringify({
                        tableArray: tableArray,
                        customer_id: customer.value
                    })

                };
            $.post('/admin/serviceorder/', data )
                .done(function(response) {
                    if(response) {
                        console.log(response)
                        toastr.success('Order Successfully Saved');
                        servicelist.innerHTML = "";
                        document.querySelector('#total').innerHTML = "00.00 PKR";
                    } else {
                        toastr.error('Something wrong.');
                    }
                })
                .fail(function(response) {
                    var err = JSON.parse(response.responseText);
                    var errors = err.errors;
                    for (const key in errors) {
                        // console.log(`${key}: ${errors[key]}`);
                        toastr.error(`${errors[key]}`);
                    }
                });
        }

    }
</script>

@endsection