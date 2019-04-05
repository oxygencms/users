@extends('oxygencms::admin.layout')

@section('title', 'Users')

@section('content')

    <div class="row">
        <div class="col-12 d-flex align-items-center mb-3">
            <h1>Users</h1>

            <div class="ml-auto d-flex justify-content-end">
                <div>
                    <a href="{{ route('admin.user.create') }}" class="btn">
                        Create <i class="far fa-edit"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <vue-good-table
            :columns="[
                {label: 'Name', field: 'name'},
                {label: 'Email', field: 'email'},
                {label: 'Roles', field: 'applied-roles', sortable: false},
                {label: 'Actions', field: 'actions', width: '100px', globalSearchDisabled: false, sortable: false},
            ]"
            :rows="models"
            :search-options="{enabled: true}"
            :pagination-options="{enabled: true}"
    >
        <template slot="table-row" slot-scope="props">
            <span v-if="props.column.field === 'applied-roles'">
                <span class="badge badge-secondary mr-1"
                      v-for="role in props.row.roles"
                      v-text="role.name"
                ></span>
            </span>

            <span v-if="props.column.label === 'Actions'" class="action-links">
                <a :href="props.row.edit_url" title="Edit">edit</a>

                <a @click.prevent="confirmAndDestroy(props.row)" href="#" title="Delete">
                    delete
                </a>
            </span>

            <span v-else v-text="props.formattedRow[props.column.field]"></span>
        </template>
    </vue-good-table>

@endsection