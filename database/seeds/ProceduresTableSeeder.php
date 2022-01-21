<?php

use Illuminate\Database\Seeder;
use App\Procedure;
use Illuminate\Support\Facades\DB;

class ProceduresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Procedure::create([
            'title' => 'Anaesthesia',
            'author' => 'Dr. Jason Erasmus ',
            'description' => 'Some operations can only be performed under full general anaesthesia in hospital, while other operations can be performed using either local anaesthesia or local anaesthesia with conscious sedation.',
            'color' => '#f9ac1d',
            'content' => '**Type of anaesthesia**

            You have met with your Maxillofacial and Oral surgeon, and it has jointly been decided that an operation is required for a specific reason. Different types of anaesthesia may have been discussed for your particular needs.  Some operations can only be performed under full general anaesthesia in hospital, while other operations can be performed using one of the following techniques:

            * Local anaesthesia alone
            * Local anaesthesia with conscious sedation',
        ]);
        Procedure::create([
            'title' => 'Bone grafting',
            'author' => 'Dr Carlo Ferretti',
            'description' => 'Maxillofacial and oral surgeons are intimately involved in repairing damage to the facial skeleton which may involve the replacement of missing skeleton by bone grafting. ',
            'color' => '#28b573',
            'content' => 'Of all our body features, the one that imparts to us the characteristic of individuality is our face. The facial skeleton forms the bedrock on which the drape of skin lies and thus changes to this skeleton have profound influence on both the form function of our face. Bone may be lost as a result of injury, a disease process, or surgical removal due to bone tumours.

            The replacement of missing bone to reestablish the form of the face and the various functions it subsumes is a cornerstone of treatment. Moreover, the burgeoning requirement for the replacement of missing teeth with osseointegrated dental implants has required the evolution of a large array of bone replacement techniques to repair the considerable jaw bone loss associated with the loss of teeth. Maxillofacial and Oral surgeons are intimately involved in repairing damage to the facial skeleton which may involve the replacement of missing skeleton by bone grafting.',
        ]);
        Procedure::create([
            'title' => 'Cleft lip and palate',
            'author' => 'Professor Kurt-W. Bütow',
            'description' => 'Exceptional facial cleft deformity, or cleft lip (alveolus) palate, cannot be treated successfully by only one discipline or speciality.',
            'color' => '#00aac5',
            'content' => '**The multidisciplinary approach and the therapy protocol**

            *Multidisciplinary approach*

            The facial cleft deformity or cleft lip, alveolus and palate and exceptional cleft deformity cannot be treated successfully by only one discipline or specialty. The interaction and consultation between various disciplines enhances understanding of the possibilities and limitations of the various disciplines involved.

            A typical multidisciplinary clinic consists of the following basic members:
            * Surgeon [Maxillo-Facial and Oral Surgeon]
            * Orthodontist
            * Paediatrician
            * Speech-language therapist
            * Community nurse',
        ]);
        Procedure::create([
            'title' => 'Dental implants',
            'author' => 'Dr. Jason Erasmus',
            'description' => 'If you are missing any of your natural teeth, implant dentistry can provide you with teeth that look and feel like your very own. ',
            'color' => '#056cb6',
            'content' => '**DON\'T LET MISSING TEETH LIMIT YOUR LIFE**

            If you are missing any of your natural teeth, implant dentistry can provide you with teeth that look and feel like your very own. Permanent replacement teeth can be yours without the embarrassment of loose dentures or having to cut into other healthy teeth in your mouth. An attractive cosmetic smile is possible. Implants will enable you to enjoy the simple pleasures of unrestricted eating. With Dental Implants you can have the confidence to pursue an active business and social life. *Many people choose implants to preserve their facial bones. Conventional dentures usually lead to accelerated bone loss*.',
        ]);
        Procedure::create([
            'title' => 'Dry socket',
            'author' => 'Dr. Jason Erasmus',
            'description' => 'Dry socket (alveolar osteitis) is a dental condition that occurs when the blood clot at the site of a tooth extraction is dislodged, exposing underlying bone and causing increasing pain. ',
            'color' => '#d3545a',
            'content' => 'Dry socket (alveolar osteitis) is a dental condition that occurs when the blood clot at the site of a tooth extraction is dislodged, exposing underlying bone and causing increasing pain. It\'s the most common complication following tooth extractions, such as the removal of impacted wisdom teeth. But with proper postoperative dental care and avoidance of risk factors, dry socket often can be prevented. When it does occur, treatment usually provides immediate relief.',
        ]);
        Procedure::create([
            'title' => 'Facial injuries, treatments and prevention',
            'author' => 'Dr. Francois Erasmus',
            'description' => 'Maxillofacial injuries, also referred to as facial trauma, encompass any injury to the mouth, face and jaw. ',
            'color' => '#f9ac1d',
            'content' => 'Maxillofacial injuries, also referred to as facial trauma, encompass any injury to the mouth, face and jaw. Maxillofacial injuries are most commonly caused by motor vehicle accidents, on-the-job accident, act of violence or sporting mishap. Injuries can vary from a dislodged (bumped out) tooth/teeth to complex combination of fractures of the bones of the face ie. Lower jaw (aka Mandible), Upper jaw (Maxilla), Cheek-bones, eye-sockets and the nose and forehead.',
        ]);
        Procedure::create([
            'title' => 'Frenectomy',
            'author' => 'Dr. Suvir Singh',
            'description' => 'Frenectomy is the surgical release of the frenum. The frenum is the tag of skin between the lip and gum (labial frenum) and below the tongue (lingual frenum). ',
            'color' => '#28b573',
            'content' => 'A frenectomy is the surgical release of a frenum. The frenum is the tag of “skin” between the lip and gum (labial frenum) and below the tongue (lingual frenum).

            **Labial Frenum**

            This tag of tissue occasionally attaches too high up on the gum.  The upper or lower lip might be affected but more commonly the upper lip is involved.  In severe cases the attachment is thick and fibrous resulting in a diastema (spacing) between the two front teeth. Often patients have consulted a Dentist or Orthodontist to close this gap.  The labial frenum might be a problem in patients of all age groups from toddlers to adults.',
        ]);
        Procedure::create([
            'title' => 'Orthognathic surgery',
            'author' => 'Prof. Johan Reyneke',
            'description' => 'Orthognathic surgery is the surgical repositioning of the jaw to establish a normal relationship between the upper and lower jaws. The treatment involves the skills of both  an orthodontist and a maxillofacial and oral surgeon.',
            'color' => '#00aac5',
            'content' => '**WHAT IS ORTHOGNATHIC SURGERY?**

            Orthognathic surgery is also known as “Surgical Orthodontics” and the treatment involves the skills of both an Orthodontist and a Maxillofacial and Oral Surgeon.  An Orthodontist can move the teeth while the surgeon is able to surgically reposition the jaw(s).  The aim of orthognathic surgery is to surgically reposition the jaw(s) to establish a normal relationship between the upper and lower jaws, which will facilitate the orthodontic positioning of the teeth into a normal bite. The benefits include an improved ability to swallow, chew, speak and breathe. In many cases an important benefit is an enhanced facial balance and appearance.',
        ]);
        Procedure::create([
            'title' => 'Temporomandibular Joint (TMJ) disorders',
            'author' => 'Dr. Jason Erasmus',
            'description' => 'The temporomandibular joint is the connection between the temporal bone of the skull and the lower jawbone (mandible). The joints are supported by ligaments, tendons and muscles responsible for jaw movement. ',
            'color' => '#056cb6',
            'content' => 'The temporomandibular joint is the connection between the temporal bone of the skull and the lower jawbone (mandible). There are two temporomandibular joints, one on each side of the face just in front of the ears. Ligaments, tendons, and muscles support the joints and are responsible for jaw movement.',
        ]);
        Procedure::create([
            'title' => 'Wisdom teeth',
            'author' => 'Dr. Jason Erasmus',
            'description' => 'The wisdom tooth, or third molar, is usually the last tooth to erupt into the mouth anytime after 16 years of age. Patients seeking removal can consult a maxillofacial and oral surgeon for quick and easy removal. ',
            'color' => '#d3545a',
            'content' => '**WHAT ARE WISDOM TEETH?**

            Most adults have 32 teeth by age eighteen.  Different teeth have different functions, for instance the molar teeth are used for chewing and grinding food.  The first molar teeth erupt within the mouth by age six, the second molars a few years later, while the third molars are the last teeth to erupt around age 18 - 20.  These four third molars are also known as wisdom teeth.',
        ]);
    }
}
