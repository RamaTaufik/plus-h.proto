@extends('layouts.main')

@section('title')
<title>Data {{$class}}</title>
@endsection

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Data - {{$class}}</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data
        </div>
        <div class="card-body">
            <div class="form-outline">
                <input type="search" id="datasearch" class="form-control" placeholder="Cari Data" maxlength="255" onchange="search()" />
            </div>
            <div style="max-height:300px;overflow:auto;">
                <table class="table font-monospace" id="datatable">
                    <thead>
                        <tr>
                            @for($i=0;$i<count($desc);$i++)
                                <th scope="col">{{$desc[$i]->Field}}</th>
                            @endfor
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                            <tr>
                                @for($i=0;$i<count($desc);$i++)
                                    <?php $field=$desc[$i]->Field; ?>
                                    <td>
                                        {{$data->$field}}
                                        @if($desc[$i]->Type=='varchar(100)')
                                        <br><img src="
                                            @if($class=='Supplier')
                                            {{ asset('assets/img_supplier/'.$data->$field) }}
                                            @elseif($class=='Image')
                                            {{ asset('assets/img_product/'.$data->product_id.'/'.$data->$field) }}
                                            @endif
                                        " alt="" style="max-width:200px;">
                                        @endif
                                    </td>
                                @endfor
                                <td>
                                    <form action="{{ route('admin.delete', [$class, $data->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                    @if(isset($data->status))
                                        <form action="{{ route('admin.orders.update', $data->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-warning btn-sm"
                                                @if($data->status=='preparing')
                                                >Kirim?
                                                @elseif($data->status=='shipping')
                                                >Sampai?
                                                @else
                                                style="display:none;">
                                                @endif
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa fa-plus-square-o me-1"></i>
                    Tambah
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.store', $class) }}" method="POST" id="add" enctype="multipart/form-data">
                        @csrf
                        {{-- @for($i=1;$i<count($desc)-2;$i++)
                            {{$desc[$i]->Type}}
                        @endfor
                        {{$fks["Country"]}} --}}
                        <button type="submit" class="btn btn-primary m-2">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa fa-wrench me-1"></i>
                    Edit
                </div>
                <div class="card-body">
                    <form action="" method="POST" id="edit">
                        @csrf
                        <button type="submit" class="btn btn-primary m-2" disabled>Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function search() {
        // Declare variables
        var input, filter, table, tr, td, i, j, txtValue;
        input = document.getElementById("datasearch");
        filter = input.value.toUpperCase();
        table = document.getElementById("datatable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for(i=0;i<tr.length;i++) {
            for(j=0;j<tr[i].getElementsByTagName("td").length;j++) {
                td = tr[i].getElementsByTagName("td")[j];
                if(td) {
                    txtValue = td.textContent || td.innerText;
                    if(txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        i++;
                        j=0;
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    }
    function input(type, label, fk, fkn) {
        var res1 = document.createElement("input");
        var lab1 = document.createElement("label");
        lab1.innerHTML = label;
        document.getElementById("add").insertBefore(lab1, document.getElementById("add").lastElementChild);
        if(type.includes("bigint unsigned") || type.includes("enum")) {
            res1 = document.createElement("select");
            res1.classList.add("d-block");
        }
        else if(type.includes("varchar(100)")) {
            res1.type = "file";
        }
        else if(type.includes("varchar")) {
            res1.type = "text";
            res1.setAttribute("placeholder", "Isi disini")
        }
        else if(type.includes("int")) {
            res1.type = "number";
            res1.value = 0;
            res1.setAttribute("min", 0);
            if(label=="rating") {
                res1.setAttribute("max", 5);
            }
            if(label=="qty" || label=="rating") {
                res1.setAttribute("min", 1);
                res1.value = 1;
            }
        }
        else if(type.includes("text")) {
            res1 = document.createElement("textarea");
            res1.setAttribute("placeholder", "Isi disini")
        }
        else if(type.includes("datetime")) {
            res1.type = "datetime-local";
            
        }
        res1.classList.add("form-control", "mb-2");
        res1.setAttribute("name", label);
        res1.required = true;
        document.getElementById("add").insertBefore(res1, document.getElementById("add").lastElementChild);
        if(type.includes("enum")) {
            var val = type.slice(5, -1).replaceAll("'", "").split(",");
            for(i=0;i<val.length;i++) {
                var opt = document.createElement("option");
                opt.value = val[i];
                opt.text = val[i];
                res1.appendChild(opt);
            }
        }
        else if(type.includes("bigint unsigned")) {
            for(let i=0;i<fk.length;i++) {
                var opt = document.createElement("option");
                opt.value = fk[i]["id"];
                opt.text = fk[i]["id"] + " - " + fk[i][fkn];
                res1.appendChild(opt);
            }
        }
        var res2 = res1.cloneNode(true);
        res2.disabled = true;
        var lab2 = lab1.cloneNode(true);
        document.getElementById("edit").insertBefore(lab2, document.getElementById("edit").lastElementChild);
        document.getElementById("edit").insertBefore(res2, document.getElementById("edit").lastElementChild);
    }
</script>
    <?php 
    for($i=1;$i<count($desc)-2;$i++) {
        $type = $desc[$i]->Type; 
        $field = $desc[$i]->Field; 
        echo '<script>input("'.$type.'","'.$field;
        if($type=="bigint unsigned") {
            $name = ucwords(substr($desc[$i]->Field, 0, -3), "_");
            $fkey = $fks[$name];
            $fkname = $colname[$name][1]->Field;
            echo '",'.$fkey.',"'.$fkname;
        }
        echo'");</script>';
        } ?>
@endsection