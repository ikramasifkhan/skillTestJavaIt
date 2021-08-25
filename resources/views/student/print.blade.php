<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Student list</title>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
<div class="invoice-box">
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Academic info</th>
            <th>Roll</th>
            <th>Class</th>
            <th>Group</th>
            <th>Section</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Birth date</th>
            <th>Present addrees</th>
            <th>Sms no</th>
            <th>Session</th>
            <th>Year</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$student->studentId}}</td>
                <td>{{$student->roll}}</td>
                <td>{{$student->klass->name}}</td>
                <td>{{$student->group->name}}</td>
                <td>{{$student->section->name}}</td>
                <td>{{$student->first_name.' '.$student->last_name}}</td>
                <td>{{$student->gender}}</td>
                <td>{{$student->birth_date}}</td>
                <td>{{$student->present_address}}</td>
                <td>{{$student->sms_no}}</td>
                <td>{{$student->session}}</td>
                <td>{{$student->year}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
