@extends('oxygencms::admin.layout')

@section('title', 'Roles')

@section('content')

    <div class="row">
        <div class="col-12 d-flex align-items-center mb-3">
            <h1>Roles</h1>

            <div class="ml-auto d-flex justify-content-end">
                <div>
                    <a href="{{ route('admin.role.create') }}" class="btn">
                        Create <i class="far fa-edit"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <table-component :data="models">
        <table-column show="name" label="Name"></table-column>

        <table-column label="Permissions">
            <template slot-scope="row">
                <h6>
                    <span class="badge badge-secondary mr-1"
                          v-text="permission.name"
                          v-for="permission in row.permissions"
                    ></span>
                </h6>
            </template>
        </table-column>

        <table-column label="Actions" :filterable="false" :sortable="false">
            <template slot-scope="row">
                <a :href="row.edit_url">edit</a>
                <a href="#" @click.prevent="confirmAndDestroy(row)">delete</a>
            </template>
        </table-column>
    </table-component>

@endsection