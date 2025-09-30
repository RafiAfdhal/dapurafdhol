<style>

        footer {
            background-color: #6D4C41 !important;
            color: #FBE9E7 !important;
            margin-top: auto;
            padding-top: 3rem; /* Padding lebih banyak */
            padding-bottom: 3rem;
            border-top: 1px solid rgba(255, 179, 0, 0.2); /* Garis tipis di atas footer */
        }
        footer h5, footer h6 {
            color: #FFB300 !important;
            margin-bottom: 1rem;
        }
        footer p, footer li {
            font-size: 0.95rem; /* Ukuran teks lebih teratur */
            line-height: 1.6;
        }
        footer a {
            color: #FBE9E7 !important;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        footer a:hover {
            color: #FFB300 !important;
            text-decoration: underline;
        }
        footer .d-flex.gap-3 a {
            font-size: 1.8rem !important; /* Ukuran ikon sosial lebih besar */
            transition: transform 0.3s ease;
        }
        footer .d-flex.gap-3 a:hover {
            transform: translateY(-3px); /* Efek angkat pada ikon sosial */
            color: #FF8A00 !important;
        }
        footer .text-white-50 {
            color: rgba(251, 233, 231, 0.6) !important;
            margin-top: 2rem !important;
            font-size: 0.85rem;
        }

        
        
        /* Header Styles */
        header {
            width: 100%;
            max-width: 960px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
            margin-bottom: 3rem;
        }
        header a {
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.125rem;
            transition: color 0.2s ease-in-out;
        }
        header .back-link {
            color: #6D4C41; /* Cokelat Gelap */
        }
        header .back-link:hover {
            color: #3E2723; /* Teks Utama */
        }
        header .logout-link {
            color: #E67A00; /* Oranye Gelap */
        }
        header .logout-link:hover {
            color: #FF8A00; /* Oranye Cerah */
        }

         /* Success Message */
        .alert-custom-success {
            width: 100%;
            max-width: 960px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            background-color: #e8f5e9; /* Light green */
            border: 1px solid #4CAF50; /* Green */
            color: #2e7d32; /* Dark green */
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .alert-custom-success button {
            background: none;
            border: none;
            font-size: 1.5rem;
            line-height: 1;
            color: #2e7d32;
            cursor: pointer;
        }
        .alert-custom-success button:hover {
            color: #1b5e20;
        }

        /* Main Content Wrapper */
        .main-wrapper {
            width: 100%;
            max-width: 960px;
            background-color: white;
            border-radius: 1.5rem;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            padding: 3rem;
            display: flex;
            flex-direction: column; /* Stack sections vertically */
            gap: 3rem; /* Spacing between main sections */
        }

        /* Top Section: Horizontal Profile Edit */
        .profile-edit-section {
            display: grid;
            grid-template-columns: 1fr; /* Default for mobile */
            gap: 3rem;
        }
        @media (min-width: 768px) { /* md breakpoint: 2 columns */
            .profile-edit-section {
                grid-template-columns: 1fr 2fr; /* 1/3 for avatar, 2/3 for form */
            }
        }

        /* Avatar Section */
        .avatar-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2rem;
        }
        .avatar-placeholder {
            width: 192px;
            height: 192px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 5rem;
            font-weight: 800;
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            background-color: #8D6E63; /* Cokelat Sedang */
        }
        .avatar-glow {
            box-shadow: 0 0 15px 4px #FFB300; /* Oranye/Kuning */
            transition: box-shadow 0.3s ease-in-out;
        }
        .avatar-glow:hover {
            box-shadow: 0 0 25px 6px #FF8A00; /* Oranye Cerah */
        }
        .avatar-img {
            width: 192px;
            height: 192px;
            border-radius: 50%;
            object-fit: cover;
            cursor: pointer;
            border: 3px solid #FFB300;
        }

        /* Form Buttons */
        .btn-custom {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 600;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease-in-out;
            width: 100%;
            max-width: 250px;
            text-decoration: none;
        }
        .btn-upload {
            background-color: #fff3e0; /* Light orange for upload */
            color: #FFB300;
            border: 1px solid #FFB300;
        }
        .btn-upload:hover {
            background-color: #ffe0b2;
            color: #E67A00;
            border-color: #E67A00;
        }
        .btn-delete {
            background-color: #EF5350; /* Red */
            color: white;
            border: 1px solid #EF5350;
        }
        .btn-delete:hover {
            background-color: #E53935;
            border-color: #E53935;
        }

        /* Edit Profile Section */
        .edit-profile-form-section h2 {
            font-size: 2.25rem;
            font-weight: 800;
            color: #6D4C41; /* Cokelat Gelap */
            margin-bottom: 2rem;
            border-bottom: 4px solid #FFB300;
            padding-bottom: 0.5rem;
            text-align: left;
        }

        /* Floating Label Styles */
        .floating-label {
            position: relative;
            margin-bottom: 1.75rem;
        }
        .floating-label input {
            border: 2px solid #A1887F; /* Teks Sekunder/Placeholder */
            border-radius: 0.75rem;
            padding: 1rem;
            width: 100%;
            font-size: 1rem;
            background: transparent;
            outline: none;
            transition: border-color 0.3s;
            color: #3E2723;
        }
        .floating-label input:focus {
            border-color: #FFB300; /* Oranye/Kuning */
        }
        .floating-label label {
            position: absolute;
            top: 1rem;
            left: 1rem;
            color: #A1887F;
            pointer-events: none;
            transition: all 0.3s ease;
            font-weight: 600;
        }
        .floating-label input:focus + label,
        .floating-label input:not(:placeholder-shown) + label {
            top: -0.5rem;
            left: 1rem;
            font-size: 0.75rem;
            color: #FFB300;
            background: white;
            padding: 0 0.25rem;
        }

        /* Save Button */
        .btn-save {
            width: 100%;
            background-color: #FFB300;
            color: #3E2723;
            padding: 1rem 0;
            border-radius: 1rem;
            font-size: 1.125rem;
            font-weight: 800;
            box-shadow: 0 6px 15px rgba(255, 179, 0, 0.5);
            transition: background-color 0.2s ease-in-out;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.75rem;
            border: none;
        }
        .btn-save:hover {
            background-color: #FF8A00;
            color: #3E2723;
            box-shadow: 0 8px 20px rgba(255, 179, 0, 0.6);
        }

        /* Section Headers (for Social Media) */
        .section-header {
            font-size: 1.75rem; /* Slightly smaller than main h2 */
            font-weight: 700;
            color: #6D4C41;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #FFB300; /* Thinner line */
            padding-bottom: 0.25rem;
        }

        /* Social Media Section */
        .social-media-section {
            text-align: center;
        }
        .social-media-section h3 {
            margin-bottom: 1.5rem;
        }
        .social-icons {
            display: flex;
            justify-content: center;
            gap: 1.5rem; /* Adjust gap between icons */
        }
        .social-icons a {
            font-size: 2.5rem; /* Larger icons */
            color: #6D4C41; /* Dark Brown for icons */
            transition: color 0.2s ease-in-out;
            text-decoration: none; /* Remove underline for links */
        }
        .social-icons a:hover {
            color: #FFB300; /* Accent color on hover */
        }

        /* Footer */
        footer {
            margin-top: 5rem;
            margin-bottom: 2.5rem;
            text-align: center;
            color: #A1887F;
            font-weight: 600;
            user-select: none;
        }

        /* Utility for d-none in Bootstrap */
        .d-none {
            display: none !important;
        }

        /* Hilangkan bullet/titik dari dropdown navbar */
.navbar .nav-item,
.admin-navbar .nav-item {
    list-style: none !important;
}


</style>