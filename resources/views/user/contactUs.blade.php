@extends('user.parent')

@section('styles')
<link href="{{ asset('user/contact.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- CONTACT PAGE -->
<section class="contact-page">

    <h1>Get in Touch</h1>
    <p class="subtitle">We’d love to hear from you</p>

    <div class="contact-wrapper">

        <!-- CONTACT INFO -->
        <div class="contact-info">
            <h2>Contact Information</h2>

            <ul>
                <li><strong>Address:</strong> Main Street, City Center</li>
                <li><strong>Phone:</strong> +970 599 000 000</li>
                <li><strong>Email:</strong> support@bikeshop.com</li>
                <li><strong>Working Hours:</strong> Sun – Thu, 9:00 AM – 6:00 PM</li>
            </ul>
        </div>

        <!-- CONTACT FORM -->
        <div class="contact-form-wrapper">
            <h2>Send Us a Message</h2>

            <form action="{{ route('user.submitQuestion') }}" method="POST" class="contact-form">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
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
                        <option value="support_dep">Support Department</option>
                        <option value="business_dep">Business Department</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>

                <button type="submit" class="btn-submit">Send Message</button>

            </form>
        </div>

    </div>

</section>

@endsection

