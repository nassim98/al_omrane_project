<template>
    <div class="container">
        <!-- row -->
        <div class="row mt-5">
            <div class="col-xl-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Table des Documents</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Numero d'ordre</th>
                                <th>Date</th>
                                <th>Chef Responsable</th>
                                <th>Agence</th>
                                <th>Ville</th>
                                <th>Objet</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="document in documents" :key="document.id">
                                <td>{{document.num_ordre}}</td>
                                <td>{{document.date}}</td>
                                <td>{{document.chef_responsable}}</td>
                                <td>{{document.agence}}</td>
                                <td>{{document.ville}}</td>
                                <td>{{document.objet}}</td>
                                <td>{{document.type}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success"><span>Action</span></button>
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-list align-left"></i>
                                                Details
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-plus-square align-left"></i>
                                                Modifier
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-archive nav-icon"></i>
                                                Archiver
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <!-- card-footer -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">«</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">»</a></li>
                        </ul>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- ./row -->
    </div>
</template>

<script>
    export default {
        data(){
            return {
                documents:{}
            }
        },
        methods:{
            chargerDocuments(){
                axios.get("api/document").then(({data}) => (this.documents = data.data));
            }
        },
        created() {
            this.chargerDocuments();
        }
    }
</script>
