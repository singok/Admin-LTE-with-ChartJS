<x-app-layout>
    <x-slot name="title">
        Student
    </x-slot>

    <!-- Content Header (Page header) -->
    <x-content-header heading="Student" title="Student" route-name="student.list" />
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col connectedSortable">
                    <table id="myTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Fname</th>
                                <th>Mname</th>
                                <th>Lname</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>D-O-B</th>
                                <th>Grade</th>
                                <th>StudentID</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </section>
                <!-- /.Left col -->
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    @push('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#myTable').DataTable({
                    'ajax': '{{ route("student.getdata") }}',
                    'columns': [{
                            'data': 'fname'
                        },
                        {
                            'data': 'mname'
                        },
                        {
                            'data': 'lname'
                        },
                        {
                            'data': 'email'
                        },
                        {
                            'data': 'phone'
                        },
                        {
                            'data': 'gender'
                        },
                        {
                            'data': 'DOB'
                        },
                        {
                            'data': 'grade'
                        },
                        {
                            'data': 'studentid'
                        }
                    ]
                });
            });
        </script>
    @endpush
</x-app-layout>
