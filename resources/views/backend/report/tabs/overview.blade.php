<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>Child's Photo</th>
                <td><img src="{{ url($report->photo) }}" class="user-profile-image"  /></td>
            </tr>
            <tr>
                    <th>Report Type</th>
                    <td>{{ $report->type }}</td>
                </tr>
                <tr>
                        <th>Reporter Phone Number</th>
                        <td>{{ $report->reporter_phone_number }}</td>
                    </tr>
            <tr>
                <th>Name</th>
                <td>{{ $report->name }}</td>
            </tr>
            <tr>
                    <th>Age</th>
                    <td>{{ $report->age }}</td>
             </tr>
             <tr>
                    <th>Gender</th>
             <td>{{$report->gender == '1' ? 'Female' : 'Male' }}</td>
    
             </tr>
            

             <tr>
                    <th>Child's Weight</th>
                    <td>{{ $report->weight }}</td>
                </tr>
           
                <tr>
                    <th>Child's Height</th>
                    <td>{{ $report->height }}</td>
                </tr>
            

                    <tr>
                            <th>Child's Weight</th>
                            <td>{{ $report->weight }}</td>
                        </tr>
                
                        <tr>
                                <th>Child's Eye Color</th>
                                <td>{{ $report->eye_color }}</td>
                            </tr>
                    
                            <tr>
                                    <th>Child's Hair Color</th>
                                    <td>{{ $report->hair_color }}</td>
                                </tr>
                    
                <tr>
                <th>Lost Since</th>
                <td>{{ $report->lost_since }}</td>
            </tr>
           
                    <th>Last Seen On</th>
                    <td>{{ $report->last_seen_on }}</td>
                </tr>


                <tr>
                        <th>Last Seen at</th>
                        <td>{{ $report->last_seen_at }}</td>
             </tr>
             <tr>
                    <th>Found?</th>
                    <td>{{ $report->is_found == '1' ? 'Yes' : 'No' }}</td>
         </tr>
                    

            
        </table>
    </div>
</div><!--table-responsive-->