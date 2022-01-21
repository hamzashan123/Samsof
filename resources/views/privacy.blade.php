@extends('layouts.master', ['footerSidebar' => false])
@section('title', 'Privacy Policy')
@section('content')
    <navigator active="conference"></navigator>
    <page-banner src="{{ asset('images/banners/who-we-are.jpg') }}" :breadcrumb="['Home']">
        <template v-slot:title>
            <span>Privacy</span>Policy <br>
        </template>
    </page-banner>
    <div class="container content-container has-text-centered-touch">
        <div class="columns">
            <div class="column page-section-body legal">
                <div>
                    <p>
                        <i>
                            Last updated: June 2021
                        </i>
                    </p>
                    <p class="mb-1">
                        The South African Society of Maxillofacial and Oral Surgeons (SASMFOS) considers the protection of personal information how personal information is collected and processed as very important. This privacy policy outlines how www.sasmfos.org (this website) collects, processes and uses personal information. 
                    </p>
                    <p class="mb-1">
                        This privacy policy is simple as we do not really process personal information. This privacy policy serves to provide clarity on how we collect personal information and process this information. 
                    </p>
                    <h2 class="title mb-4">
                        How we use analytics or data analysis tools for statistical analysis of user behaviour
                    </h2>
                    <p class="mb-1">
                        We use Google Analytics to monitor user engagement on the website to help us improve our overall user experience of the website. Your IP addess will be anonymized during this process so that you are not identifiable to us. The information collected through this process is used to:
                    </p>
                    <ul class="mb-1 content">
                        <li>Provide insight and guidance as to how we may optimize the functionality, accessibility and stability of the website;</li>
                        <li>We also use insights from monitoring anonymised suer enagagement with the website to see what users are interested in as this helps us to develop content that is relevant and informative to both our members, general website visitors who may be Maxillofacial and Oral specialists, suppliers and other important industry stakeholders. </li>
                        <li>If you do feel that there is a certain aspect of the website which we may improve on relating to content, please contact us directly on sasmfos@stone.consulting.</li>
                    </ul>
                    <h2 class="title mb-4">
                        How we use member and supplier information and how this is published on the website
                    </h2>
                    <p class="mb-1">SASMFOS exists to serve its members. As such, the website serves to celebrate and showcase the work and accomplishments of South African Maxillofacial and Oral surgeons and specialists within the field. </p>
                    <p class="mb-1">All sensitive member information is kept confidential and private. Certain information is published on the website to help promote members practises. The information shared on the website includes practise contact number, email and address. Members are informed upon registration which information will be published on the SASMFOS website. If a member does notice that sensitive information has been published and requires an update or changes, please contact us directly to assist. You may email us on sasmfos@stone.consulting.</p>
                    <p class="mb-1">All member information published on this website is accessible from the public domain and we maintain clarity in terms of what information will be published on the website.</p>
                    <h2 class="title mb-4">What is personal information?</h2>
                    <p class="mb-1">Personal information is any information which is unique to you, this is information which identifies you as an individual. This includes, but is not limited to, information which tells us your name, your contact details, some of your interests, your IP address, your identity number, etc.</p>
                    <p class="mb-1">On the SASMFOS website the only personal information we collect is your anonymised IP address. This is collected through Google Analytics and some cookies which is used to help us improve your user engagement of the website. We do not use this information for direct marketing or advertising purposes. </p>
                    <h2 class="title mb-4">How we obtain information about you</h2>
                    <p class="mb-1">The information we collect about you varies depending upon which part of the website you visit and how you interact with it. Personal information about you may be collected without you being aware of it through your use of the website. In this instance, we do our utmost to ensure that you are aware of the information collected which relates to you, as well as the purpose for which such information is collected.</p>
                    <h2 class="title mb-4">Information which you are aware we collect</h2>
                    <p class="mb-1">On our pages you can update personal details, make requests, view information, and submit information and register to become a SASMFOS member. Some of the types of personal information that may be collected on these pages include your name, your title, your place of work, your work address, your e-mail address, your phone number, information pertaining to your career and areas of interest. </p>
                    <p class="mb-1">We do not acquire more information about you than is necessary for us to provide our services efficiently.</p>
                    <h2 class="title mb-4">What we do with your information</h2>
                    <p class="mb-1">The information which you provide us through the use of our website will be processed purely for the purposes provided to you at the point of collection or in this Privacy Policy, as an example we may use your personal information to contact you regarding information or important updates relating to SASMFOS. We ensure all our employees are aware of their responsibilities to protect the privacy of your personal information and we have internal privacy policies and controls in place to safeguard your personal information.</p>
                    <ul class="mb-1 content">
                        <li>We do not share any personal information with third parties, unless required by law, and if we have consent from you. </li>
                        <li>All information collected on the website, apart from the members portal, is anonymised. </li>
                        <li>Information collected on the members portal has been shared directly with us by SASMFOS members. We do not resell or provide access to this information to any third party sites. If needed, we will only do so with the consent from each member.</li>
                        <li>We do share SASMFOS news and important announcements to SASMFOS members, in the event that you are the recipient of such communication, you will be able to ‘unsibscribe’ from the communication and will not receive any communication going forward unless you subscribe directly.</li>
                    </ul>
                    <h2 class="title mb-4">Cookie policy – what are cookies and how do we use them</h2>
                    <p class="mb-1">We only functional, or required cookies that are necessary for our website to function. These include cookies which are needed for Google Analytics to work. The information collected in this process is anonymised, or de-identified data, in other words we do not know who you are.</p>
                    <p class="mb-1">For more information on cookies and how to manage your cookie settings for safe browsing, please visit http://www.allaboutcookies.org/ (run by the Interactive Marketing Bureau) for some valuable information and guidance. </p>
                    <h2 class="title mb-4">How we protect the information we process</h2>
                    <p class="mb-1">We have implemented privacy and security controls for the purpose of protecting the personal information we collect and to provide for the use thereof within our organisation. In the event of a security breach, or if a member’s personal information has been compromised, we will notify the affected person immediately and ensure that the nessecary protocol is followed to secure the platform. </p>
                    <h2 class="title mb-4">Links to third party websites</h2>
                    <p class="mb-1">The SASMFOS website contains links to other websites belonging to third parties. We do not control the privacy practices of these other sites. You should therefore ensure, when you leave our site that you have read that third party site’s privacy notice.</p>
                    <h2 class="title mb-4">Changes to the Privacy Policy</h2>
                    <p class="mb-1">We reserve the right, at our sole discretion, to modify, add or remove sections of this Privacy Policy at any time, bearing that it complies with and respects the ongoing protection of your personal information.</p>
                    <h2 class="title mb-4">Access to the personal data we collect</h2>
                    <p class="mb-1">You have a right to access the personal data we hold about you. If you wish to obtain a copy of the personal information we retain about you, please contact us via email and we will revert accordingly for you.</p>
                    <h2 class="title mb-4">Privacy queries</h2>
                    <p class="mb-1">If you have any questions regarding this Privacy Notice, or you wish to update your details, please contact us at sasmfos@stone.consulting or at the address provided in the Contact Us section on the site.</p>
                    <h2 class="title mb-4">This Privacy Policy is governed by the laws and regulations of the South Africa Protection of Personal Information Act (PoPIA)</h2>
                    <p class="mb-1">This Privacy Policy will be governed by the laws of the Republic of South Africa and the South African Protection of Personal Information Act (PoPIA). You consent to the jurisdiction of the South African courts for any dispute which may arise out of this Privacy Policy.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
