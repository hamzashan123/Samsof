@extends('layouts.master', ['footerSidebar' => false])
@section('title', 'Resources')
@section('content')
    <navigator active="resources"></navigator>
    <page-banner src="{{ asset('images/banners/resources.jpg') }}" :breadcrumb="['Home']">
        <template v-slot:title>
            <span>Resources</span>
        </template>
    </page-banner>

    <floating-image src="{{ asset('images/content/medical-funders.png') }}" alt="Tools" distance="650px"></floating-image>
    <floating-image src="{{ asset('images/content/patients.png') }}" alt="Tools" distance="1800px"></floating-image>
    <floating-image src="{{ asset('images/content/hospitals.png') }}" alt="Tools" distance="3200px"></floating-image>

    <div class="container">
        <div class="columns">
            <div class="column is-3 is-offset-1 sub-nav">
                <aside class="menu">
                    <ul class="menu-list is-uppercase">
                        <li><a href="#medical-funders">Medical Funders</a></li>
                        <li><a href="#patients">Patients</a></li>
                        <li><a href="#hospitals">Hospitals</a></li>
                        <li><a href="#healthcare">Healthcare professionals</a></li>
                        <li><a href="#key-views">Key views and issues</a></li>
                    </ul>
                </aside>
            </div>
        </div>

        <div class="columns">
            <div class="column is-7 is-offset-1">
                <section class="page-section" id="medical-funders">
                    <div class="columns">
                        <div class="column">
                            <header class="page-section-header">
                                <div class="icon">
                                    <img src="{{ asset('svg/hands-coin.svg') }}" alt="Medical funders">
                                </div>
                                <h3 class="title">Medical funders</h3>
                            </header>
                            <div class="page-section-body">
                                <h3><strong>• The advantages of using an MFO specialist</strong></h3>
                                <p>
                                    Oral and maxillofacial surgery is the surgical specialty concerned with the
                                    diagnosis and treatment of diseases affecting the mouth, jaws, face and neck. Using
                                    an MFO specialist ensures patients are treated with the best possible care and that
                                    procedures are of the highest standard.
                                </p>
                                <p>
                                    List of procedures that will save time, money and is safer to do with a specialist:
                                </p>
                                <div class="content">
                                    <ul class="has-text-weight-semi-bold">
                                        <li>Wisdom teeth</li>
                                        <li>Dental implants</li>
                                        <li>Site preparation for implant placement (Bone grafting and sinus augmentation)</li>
                                        <li>Apicectomies</li>
                                        <li>Exposure of impacted teeth for orthodontic treatment</li>
                                        <li>Soft tissue biopsies</li>
                                        <li>Extraction of teeth and root remnants</li>
                                        <li>Release of active frenums (Labial and lingual)</li>
                                    </ul>
                                </div>
                                <a href="{{ route('ask') }}" class="button is-info is-rounded is-uppercase mb-2">Find out more</a>
                                <p>
                                    MFO specialists offer various procedures which will save time, provide value and are
                                    safer to do with a qualified and accredited specialist.
                                </p>
                                <h3><strong>•  Value-add positioning statement</strong></h3>
                                <p>
                                    SASMFOS represents a diverse and high-calibre membership, representing most MFO
                                    professionals in South Africa.
                                </p>
                                <h3><strong>•  Codes and cost savings</strong></h3>
                                <p>
                                    MFO surgeons offer multiple cost-saving procedures. These can also save on treatment
                                    and recovery time.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="page-section" id="patients">
                    <div class="columns">
                        <div class="column">
                            <header class="page-section-header">
                                <div class="icon">
                                    <img src="{{ asset('svg/wheelchair.svg') }}" alt="Patients">
                                </div>
                                <h3 class="title">Patients</h3>
                            </header>
                            <div class="page-section-body">
                                <h3><strong>•  Patient benefits of using an MFO specialist surgeon</strong></h3>
                                <p>
                                    Patients benefit greatly from using MFO specialists to diagnose and treat diseases
                                    affecting the mouth, jaws, face and neck. This can save time, money and provide
                                    reassurance that procedures are done by specialists in their field. Patients are
                                    ensured of the best possible care with procedures of the highest standard.
                                </p>
                                <h3><strong>•  Patient-centric service</strong></h3>
                                <p>
                                    Our patients are important to us. Our treatments and procedures are created with
                                    this as a top priority. We also ensure that we remain current with the latest
                                    innovations and trends to ensure the best access to quality care to our patients,
                                    both in terms of recovery time and financial savings.
                                </p>
                                <h3><strong>•  Access to world-class specialists</strong></h3>
                                <p>
                                    SASMFOS represents MFO specialists across South Africa and is also linked to various
                                    international bodies and associations. This ensures that our members remain up to
                                    date with current trends in the industry and also remain at the cutting edge of
                                    innovation.
                                </p>
                                <h3><strong>•  Medical cover for MFO procedures</strong></h3>
                                <p>
                                    SASMFOS negotiates with medical funders on behalf of our members. For more
                                    information on how to ensure that your MFO procedure is covered by your medical
                                    funder, please
                                    <a
                                        href="{{ route('ask') }}#enquiries"
                                        class="has-text-info has-text-weight-bold"
                                    >contact us</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="page-section" id="hospitals">
                    <div class="columns">
                        <div class="column">
                            <header class="page-section-header">
                                <div class="icon">
                                    <img src="{{ asset('svg/hospital.svg') }}" alt="Hospitals">
                                </div>
                                <h3 class="title">Hospitals</h3>
                            </header>
                            <div class="page-section-body">
                                <h3><strong>•  Relationship with hospitals and hospital groups</strong></h3>
                                <p>
                                    SASMFOS represents MFO specialists across the country and through this network we
                                    work closely with private and public hospitals and hospital groups.
                                </p>
                                <h3><strong>•  Patient benefits of using an MFO specialist surgeon in your hospital</strong></h3>
                                <p>
                                    MFO specialists offer various procedures which will save time, money and which is
                                    safer to do with a qualified and accredited specialist. Our members follow the
                                    highest standards of ethics and we encourage best practices in line with
                                    international standards.
                                </p>
                                <h3><strong>•  Enhancing your patient-centric service</strong></h3>
                                <p>
                                    Patients are our top priority. We assist hospitals in providing the latest and most
                                    innovative treatments and procedures to help patients get the best recovery. Our
                                    cost-effective procedures are also aimed at financial savings for patients as well
                                    as for hospitals.
                                </p>
                                <h3><strong>•  Breaking the myths on theatre time and cost</strong></h3>
                                <p>
                                    SASMFOS keeps its members abreast with the most cutting edge technologies and
                                    innovations in the industry. This provides members with the tools to save on theatre
                                    time and cost and to ensure that patients benefit from the most effective
                                    procedures.
                                </p>
                                <h3><strong>•  Participating in single procedure packages</strong></h3>
                                <p>
                                    SASMFOS works closely with MFO specialists to develop the most time and
                                    cost-effective single procedure packages. For more information on our latest
                                    offerings, please
                                    <a
                                        href="{{ route('ask') }}#enquiries"
                                        class="has-text-info has-text-weight-bold"
                                    >contact us</a>.
                                </p>
                                <h3><strong>•  Medical cover for MFO procedures</strong></h3>
                                <p>
                                    SASMFOS negotiates with medical funders on behalf of our members. For more
                                    information on how to ensure that your MFO procedure is covered by participating
                                    medical funders, please
                                    <a
                                        href="{{ route('ask') }}#enquiries"
                                        class="has-text-info has-text-weight-bold"
                                    >contact us</a>.
                                </p>
                                <h3><strong>•  Enhancing the hospital’s reactive offering (ER, trauma, oncology etc.)</strong></h3>
                                <p>
                                    MFO specialists diagnose and treat diseases affecting the mouth, jaws, face and
                                    neck. With an MFO specialist on hand, a hospital can save crucial time and money.
                                    This enhances patient satisfaction, supported by the reassurance that procedures are
                                    done by specialists and with the best possible care.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="page-section" id="healthcare-professionals">
                    <div class="columns">
                        <div class="column">
                            <header class="page-section-header" id="healthcare">
                                <div class="icon">
                                    <img src="{{ asset('svg/doctors.svg') }}" alt="Healthcare professionals">
                                </div>
                                <h3 class="title">Healthcare professionals</h3>
                            </header>
                            <div class="page-section-body">
                                <h3><strong>• Why refer to an MFO specialist surgeon</strong></h3>
                                <p>
                                    MFO specialists diagnose and treat diseases affecting the mouth, jaws, face and
                                    neck. With an MFO specialist on hand, healthcare professionals can save crucial time
                                    and money. This enhances patient satisfaction and procedures are done by specialists
                                    with the best possible care.
                                </p>
                                <h3><strong>•  Referrals process to MFO specialists</strong></h3>
                                <p>
                                    SASMFOS assists patients and their doctors to find MFO specialists in their areas
                                    and also assists with the referral process. For more information, please
                                    <a
                                        href="{{ route('ask') }}#enquiries"
                                        class="has-text-info has-text-weight-bold"
                                    >contact us</a>.
                                </p>
                                <h3><strong>•  Value of an MFO specialist</strong></h3>
                                <p>
                                    MFO specialists save crucial time and money in the diagnosis and treatment of
                                    diseases affecting the mouth, jaws, face and neck.
                                </p>
                                <p>
                                    Our support structure for furthering education and best practice in the industry,
                                    together with local and international networking opportunities, ensure that our
                                    members remain current in our service offerings.
                                </p>
                                <h3><strong>•  Your patient at the centre</strong></h3>
                                <p>
                                    MFO specialists provide skilled care for patients. We ensure that our members are
                                    equipped with knowledge of the latest trends and advancements in treatments and
                                    procedures to help patients get the best recovery possible. We also provide
                                    cost-effective procedures and time-saving methods to benefit your patient.
                                </p>
                                <h3><strong>•  Codes and cost savings</strong></h3>
                                <p>
                                    MFO surgeons offer multiple cost-saving procedures. These can also save on treatment
                                    and recovery time for patients. For a full list of procedural codes and a
                                    confidential discussion, please
                                    <a
                                        href="{{ route('ask') }}#enquiries"
                                        class="has-text-info has-text-weight-bold"
                                    >contact us</a>.
                                </p>
                            </div>
                            <header class="page-section-header" id="key-views">
                                <div class="icon mt-3">
                                    <img src="{{ asset('svg/reviewers.svg') }}" alt="Key views and issues">
                                </div>
                                <h3 class="title">Key views and issues</h3>
                            </header>
                            <div class="page-section-body pb-4">
                                <h3><strong>•  Procedures</strong></h3>
                                <p>
                                    MFO surgeons are skilled in providing a variety of cutting-edge procedures for the
                                    diagnosis and treatment of diseases affecting the mouth, jaws, face and neck. Our
                                    specialists benefit from local and international knowledge-sharing and best practice
                                    management to ensure that our patients get the best support possible.
                                </p>
                                <h3><strong>•  Changes in legislation</strong></h3>
                                <p>
                                    Our advisory services include negotiations on applicable tariffs and fees, and we
                                    provide guidance on regulatory and legislative developments which may impact on the
                                    public and the healthcare profession at large. These include engagement on public
                                    health topics such as the NHI, funder regulations and demand for healthcare
                                    services.
                                </p>
                                <h3><strong>•  Healthcare advancement</strong></h3>
                                <p>
                                    We represent MFO surgeons and engage, on their behalf, with medical aid funds to
                                    facilitate coverage of medical procedures, hospitals, healthcare providers, patients
                                    and regulatory authorities. We provide support on best practice management, as well
                                    as further education, research, professional development and insight into innovation
                                    trends in the industry.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div style="position: relative">
        <floating-image src="{{ asset('images/content/healthcare-professionals.png') }}" alt="Tools" image-position="bottom" distance="0"></floating-image>
    </div>
    <ask-sasmfos></ask-sasmfos>
@stop
