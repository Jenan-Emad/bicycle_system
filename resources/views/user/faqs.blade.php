@extends('user.parent')

@section('styles')
<link href="{{ asset('user/faq.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- CONTACT PAGE -->
<section class="contact-page">

    <h1>Contact Us</h1>
    <p class="subtitle">Have a question? We’re here to help.</p>

    <!-- FAQ SECTION -->
    <section class="faq-section">
        <h2>Frequently Asked Questions</h2>

        @foreach ($faqs as $faq)
        <div class="faq-item">
            <h3>{{ $faq->question }}?</h3>
            <p>{{ $faq->answer }}</p>
        </div>
            
        @endforeach

    </section>

    <!-- CONTACT FORM -->
    <section class="form-section">
        <h2>Ask a Question</h2>

        <form action="{{ route('user.submitQuestion') }}" method="POST" class="contact-form">
            @csrf

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="department">Department</label>
                <select id="department" name="department">
                    <option value="">Select Department</option>
                    <option value="personal_dep">Personal Department</option>
                    <option value="business_dep">Business Department</option>
                    <option value="support_dep">Support Department</option>
                </select>
            </div>

            <div class="form-group">
                <label for="message">Your Question</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn-submit">Submit</button>
        </form>
    </section>

</section>

@endsection

