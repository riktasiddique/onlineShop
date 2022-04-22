@component('mail::message')
    <div class="row">
        <h1>A new massage from: {{$contact_form_data['email']}}</h1>
        <p>Subject: {{$contact_form_data['mailSubject']}}</p>
        <p>Email: {{$contact_form_data['name']}}</p>
        <p>Phone: {{$contact_form_data['phoneNumber']}}</p>
        <p>Phone: {{$contact_form_data['massage']}}</p>
    </div>
@endcomponent
