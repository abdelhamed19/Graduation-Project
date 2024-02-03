<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Activity::create([
            "level_id" => 1,
            "title" => "سنقوم بعمل تمرين اليوجا اليوم",
            "description" => [
                "ممارسة اليوجا يمكن أن تجعلك تشعر بالتحسن وتقلل من القلق، بالإضافة إلى ذلك فهو يحسن الجهاز الهضمي ويجلب المرونة للجسم ويقوي العظام",
                "قم بالجلوس مع فرد الساقين إلى الأمام ، ضم أصابع القدمين والكعبين الي بعضعما",
                "اثني الجذع من الخصر،ضع راحتي اليد علي الاصابع الاربعة مع اصابع القدم",
                "حفاظ على استقامة الركبتين، والانحناء باتجاه الركبتين. ضع الأنف بين الركبتين",
                "إبقاء المرفقين الي الايفل مع سحب أصابع القدمين إلى الداخل باليدين",
                "قم بالتنفس و الزفير بشكل طبيعي اثناء الانحناء",
                "حافظ علي هذه الوضعية لبضعة ثوانٍ"
            ],
            "type" => "physical",
        ]);
        Activity::create([
            "level_id" => 1,
            "title" => "سنبدأ بتمرين التأمل اليوم",
            "description" => [
                "التأمل يفيد في تعزيز التنظيم العاطفي وتقليل التوتر، مما يساهم في تحسين استقرار المزاج",
                "ابحث عن مكان مريح وهادئ للجلوس أو الاستلقاء. اجلس متربعا على الأرض أو على كرسي مع وضع قدميك بشكل مسطح على الأرض. حافظ على استقامة ظهرك ووضع يديك على ركبتيك",
                "أغمض عينيك أو أبقها مفتوحة قليلاً بنظرة ناعمة. خذ أنفاسًا عميقة قليلة للمساعدة على استرخاء جسمك والاستقرار في اللحظة الحالية",
                "وجه انتباهك إلى أنفاسك. لاحظ الإحساس بكل شهيق وزفير. يمكنك التركيز على النفس أثناء دخوله وخروجه من أنفك، أو الشعور بصعود وهبوط صدرك أو بطنك",
                "عندما تركز على أنفاسك، من المرجح أن تنشأ الأفكار. اعترف بها دون إصدار أحكام وأعد انتباهك بلطف إلى أنفاسك. كن حاضرا في هذه اللحظة، ومراقبة كل نفس",
                "عندما تركز على انفاسك من المرجح ان تنشأ الافكار اعترف بها دون اصدار احكام واعد انتباهك بلطف الى انفاسك وكن حاضرا في هذه اللحظه ومراقبة كل نفس"
            ],
            "type" => "mental",
        ]);
        Activity::create([
            "level_id" => 1,
            "title" => "تمرين الامتنان",
            "description" => [
                "يساعد في التنمية العقلية الإيجابية، وتعزيز الرفاهية، وتعزيز المرونة، مما يساعد على مواجهة أنماط التفكير السلبية وتحسين الصحة العقلية بشكل عام",
            ],
            "type" => "emotional",
        ]);
        Activity::create([
            "level_id" => 1,
            "title" => "مساعدك الشخصي في التطبيق",
            "description" => [
                "استخدم المساعد الشخصي الخاص بنا حيث يمكنه إيجاد الحلول لك في بعض المشاكل التي تواجهك في حياتك الاجتماعيه"
            ],
            "type" => "social",
        ]);

        // LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL 22222222222
        Activity::create([
            "level_id" => 2,
            "title" => "تمرين 100 بيلاتيس",
            "description" => [
                "يفيد في تعزيز النشاط البدني وتحسين الصحة العقلية من خلال التركيز على التنفس المتحكم فيه والحركة الواعية",
                "ابدأ ببضع دقائق من تمارين الإحماء اللطيفة للقلب والأوعية الدموية، مثل المشي أو الركض الخفيف، لزيادة معدل ضربات القلب وتدفئة عضلاتك",
                "استلق على ظهرك، وارفع رأسك وكتفيك، ومد ساقيك، وادفع ذراعيك لأعلى ولأسفل بقوة أثناء التنفس بشكل إيقاعي، شاهد التمرين من هنا"
            ],
            "type" => "physical",
        ]);
        Activity::create([
            "level_id" => 2,
            "title" => "تحديد الاهداف وتقييمها",
            "description" => [
                "توفر البنية والتحفيز والشعور بالهدف، مما يساعد على إدارة الأعراض وتحسين احترام الذات وخلق شعور بالإنجاز. ومع ذلك، من المهم وضع أهداف واقعية وقابلة للتحقيق ."
            ],
            "type" => "mental",
        ]);
        Activity::create([
            "level_id" => 2,
            "title" => "تحديد أولويات التعاطف مع الذات",
            "description" => [
                "تعزيز الرعاية الذاتية، والحد من الحكم الذاتي، وتعزيز المرونة العاطفية، مما يدعم في نهاية المطاف الصحة العقلية والرفاهية بشكل عام."
            ],
            "type" => "emotional",
        ]);
        Activity::create([
            "level_id" => 2,
            "title" => "call",
            "description" => ["call a friend", "call a friend", "call a friend"],
            "type" => "social",
        ]);
        // LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL 33333333333333
        Activity::create([
            "level_id" => 3,
            "title" => "Shavasana",
            "description" =>["هي وضعية يوغا رائعة للابتعاد عن التوتر والقلق، فهي تزيل الإرهاق الجسدي والعقلي",
            "استلقي على السجادة على ظهرك و اترك فجوة صغيرة بين الساقين",
            "إبقاء كلتا اليدين على الأرض بعيداً قليلاً عن الجسم، مع فتح راحتي اليدين إلى الأعلى وأغمض كلتا عينيك واجعل جسمك في وضع مريح",
            "تنفس ببطء وحافظ على انتباهك الكامل للتنفس، وقم بالزفير بنفس وتيرة الشهيق ثم البقاء على هذه الوضعية لمدة 10 دقائق على الأقل.شاهد التمرين من هنا"
        ],
            "type" => "physical",
        ]);
        Activity::create([
            "level_id" => 3,
            "title" => "رؤى ملهمة",
            "description" =>["اختر كتابًا يحتوي على رؤى قابلة للتنفيذ. قم بتطبيق نصيحة أو استراتيجية واحدة من الكتاب على جهازك"],
            "type" => "mental",
        ]);
        Activity::create([
            "level_id" => 3,
            "title" => "ابدأ يومك بتسجيل ما تشعر به",
            "description" =>["توفر منفذ للتعبير عن الذات، وتسهل التنظيم العاطفي، وتتبع أنماط المزاج، مما يساعد على تعزيز الوعي الذاتي ودعم الإدارة الفعالة للأعراض"],
            "type" => "emotional",
        ]);
        Activity::create([
            "level_id" => 3,
            "title" => "call",
            "description" => ["call a friend", "call a friend", "call a friend"],
            "type" => "social",
        ]);
        // LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL 4444444444444
        Activity::create([
            "level_id" => 4,
            "title" => "Pilates Roll Up",
            "description" =>[
            "ابدأ ببضع دقائق من تمارين الإحماء اللطيفة للقلب والأوعية الدموية، مثل المشي أو الركض الخفيف، لزيادة معدل ضربات القلب وتدفئة عضلاتك",
            "العمود الفقري المحايد: حافظ على وضع العمود الفقري المحايد، مع محاذاة رأسك ورقبتك وعمودك الفقري أثناء تشغيل عضلاتك الأساسية",
            "تعلم كيفية إمالة حوضك قليلاً لتشغل عضلات البطن وتثبيت أسفل ظهرك, أبقِ القفص الصدري في الأسفل لتجنب إجهاد ظهرك وكتفيك",
            "حافظ على استرخاء كتفيك وأسفلهما، بعيدًا عن أذنيك، للحفاظ على ثبات الكتف بشكل سليم",
            " اجلس بشكل مستقيم مع فرد ساقيك، ثم قم بتحريك عمودك الفقري إلى الأسفل حتى يصل إلى السجادة، ثم عد إلى وضعية الجلوس"],
            "type" => "physical",
        ]);
        Activity::create([
            "level_id" => 4,
            "title" => "Daily Routine Development",
            "description" =>
            ["أنشئ جدولًا يتضمن العمل والترفيه والرعاية الذاتية والتفاعل الاجتماعي. تخصيص أوقات محددة لكل نشاط والالتزام بهذا الروتين",
            "لاحظ كيف يؤثر وجود هيكل محدد إنتاجيتك ورفاهيتك"],
            "type" => "mental",
        ]);
        Activity::create([
            "level_id" => 4,
            "title" => "Decision-Making Strengthening",
            "description" =>[
            " تدرب على اتخاذ القرارات بسرعة ولكن بشكل مدروس، بدءًا من الخيارات الأبسط",
        "انتقل تدريجيًا إلى قرارات أكثر تعقيدًا، مع ملاحظة عملية التفكير والنتائج"],
            "type" => "emotional",
        ]);
        Activity::create([
            "level_id" => 4,
            "title" => "call",
            "description" => ["call a friend", "call a friend", "call a friend"],
            "type" => "social",
        ]);
        // LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL 5555555555555
        Activity::create([
            "level_id" => 5,
            "title" => "Tai Chi",
            "description" =>[
            "تفيد في تعزيز الاسترخاء واليقظة والحركة الجسدية اللطيفة، مما يساعد في تقليل التوتر وتحسين استقرار المزاج وتعزيز الرفاهية العامة",
            "الوقوف مع قدميك عرض الكتفين. استرخِ على كتفيك، واخفض ذراعيك، وركز على أنفاسك. ابدأ بتوسيط نفسك وتصفية ذهنك",
            "قم بتحويل وزنك إلى ساقك اليمنى. ارفع يديك أمامك، مع توجيه راحتي اليدين للأسفل. خذ شهيقًا عندما ترفع يديك، وازفر عندما تخفضهما",
            "افتح ذراعيك على الجانبين، وارفع راحتي يديك للأعلى. تخيل أنك تحتضن بلطف كرة كبيرة قابلة للنفخ بينما تقوم بتوسيع صدرك. استنشاق عندما تفتح، والزفير عندما تغلق",
            "قم بتحويل وزنك إلى ساقك اليمنى. خطوة إلى الجانب بقدمك اليسرى، الكعب أولاً. حرك كلتا يديك بحركة دائرية سلسة، كما لو كنت تفرق الستائر",
            "قم بتحويل وزنك إلى ساقك اليسرى. خطوة إلى الجانب بقدمك اليمنى، الكعب أولا. كرر حركة اليد الدائرية على الجانب الأيسر",
            "حافظ على تنفس عميق ومنتظم أثناء ممارسة تاي شاي، حيث يساعد التنفس العميق في الاسترخاء وزيادة التركيز",
            "بعد الانتهاء من تمارين تاي شاي، قم بتمارين تبريد لتهدئة الجسم والعقل، مثل التنفس العميق وتمارين الاسترخاء"],
            "type" => "physical",
        ]);
        Activity::create([
            "level_id" => 5,
            "title" => "الطهي موهبه؟",
            "description" => ["جرب الطهي لمره واحده في كل اسبوع بإختيار وصفه لأكلتك المفضله",
             "الطهي قد يساعدك على التخلص من المشاعر السلبية"],
            "type" => "mental",
        ]);
        Activity::create([
            "level_id" => 5,
            "title" => "اليقظة الذهنية",
            "description" =>["خصص وقتًا لجلسات اليقظة الذهنية باستخدام التطبيقات أو التأملات الموجهة",
            "لاحظ كيف تؤثر هذه التمارين على مستويات التوتر لديك والوضوح العقلي",
            " قم بتدوين ملاحظات حول التغييرات التي تواجهها"],
            "type" => "emotional",
        ]);
        Activity::create([
            "level_id" => 5,
            "title" => "call",
            "description" => ["call a friend", "call a friend", "call a friend"],
            "type" => "social",
        ]);
        // LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL 6666666666666
        Activity::create([
            "level_id" => 6,
            "title" => "المشي",
            "description" => ["يُنصح بشدة بأن تدرج المشي في روتينك اليومي حيث يمكن أن يكون له تأثير إيجابي على المزاج والصحة العامة",
             "جرب المشي لمدة لا تقل عن 30 دقيقة ولا تتجاوز 60 دقيقة يوميًا",
            "حاول تخصيص وقت يومي للخروج والمشي لمدة لا تقل عن 30 دقيقة ولا تزيد عن 60 دقيقة، وستلاحظ الفرق في شعورك بالتحسن العام"],
            "type" => "physical",
        ]);
        Activity::create([
            "level_id" => 6,
            "title" => "التدريبات المعرفية",
            "description" => [
            "انخرط في تمرين ذهني مثل حل لغز أو تعلم كلمة جديدة بطريقة مختلفة",
            "لاحظ كيف تتحدى هذه الأنشطة قدراتك المعرفية وتحفزها وتتحسن قدرتك الذهنية"],
            "type" => "mental",
        ]);
        Activity::create([
            "level_id" => 6,
            "title" => "تعميق الامتنان",
            "description" => [
            "تعمق أكثر في ممارسات الامتنان من خلال الاعتراف بالأمور الصغيرة، والتي غالبًا ما يتم تجاهلها",
            "جوانب الحياة. فكر في هذه العناصر الدقيقة وعبّر عن امتنانك لها."],
            "type" => "emotional",
        ]);
        Activity::create([
            "level_id" => 6,
            "title" => "",
            "description" => ["", "", ""],
            "type" => "",
        ]);
        // LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL 7777777777777
        Activity::create([
            "level_id" => 7,
            "title" => "Anahatasana",
            "description" => [
                "يتم الاستلقاء على البطن مع وضع الذراعين ممتدة إلى الأمام، ثم يتم رفع الجسم قليلاً من الأرض مع الشعور بالتمدد في الجبهة القصيرة وتأمل في النفس",
                "ابدأ بالتنفس ببطء وعميقة. حاول توجيه التنفس نحو منطقة القلب والصدر للشعور بالتوسع والارتياح",
                "ابدأ برفع الصدر والكتفين ببطء عن الأرض باستخدام القوة الموجودة في الظهر والكتفين. يمكن أن يساعدك الاستناد على أذرعك في هذا الوضع"],
            "type" => "physical",
        ]);
        Activity::create([
            "level_id" => 7,
            "title" => "مساعي التعلم مدى الحياة",
            "description" => [
            "اختر دورة أو برنامجًا حول الموضوع الذي يهمك. خصص وقتًا كل أسبوع لذلك",
            "فكر في كيفية توسيع هذا التعلم لفهمك ويؤثر على حياتك اليومية."],
            "type" => "mental",
        ]);
        Activity::create([
            "level_id" => 7,
            "title" => "متنوعة لحل المشكلات",
            "description" => [
            "ابحث عن حلول متنوعة للمشاكل من خلال مناقشة القضايا مع أشخاص مختلفين",
            "احتضان وجهات نظر وحلول مختلفة لتوسيع ذخيرة حل المشكلات لديك"],
            "type" => "emotional",
        ]);
        Activity::create([
            "level_id" => 7,
            "title" => "",
            "description" => ["", "", ""],
            "type" => "",
        ]);
        // LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL 8888888888888
        Activity::create([
            "level_id" => 8,
            "title" => "",
            "description" => ["", "", ""],
            "type" => "physical",
        ]);
        Activity::create([
            "level_id" => 8,
            "title" => "احتضان التعبير الفني",
            "description" => ["تخصيص وقت للتعبير الفني مرتين في الشهر",
             "يمكن أن يشمل ذلك الرسم، والتلوين أو أي شكل من أشكال التعبير الإبداعي",
              " فكر في المشاعر التي تم التعبير عنها والأفكار المكتسبة منها"],
            "type" => "mental",
        ]);
        Activity::create([
            "level_id" => 8,
            "title" => "مشروبك المفضل بطريقة أخرى؟",
            "description" => ["البعض يمكن ان يكون لدية مشروب مفضل",
             "ولكن يمكنك ايضا عمل مشروبك المفضل باستخدام وصفة جديده او اضافه تحسن من الطعم اكثر",],
            "type" => "emotional",
        ]);
        Activity::create([
            "level_id" => 8,
            "title" => "",
            "description" => ["", "", ""],
            "type" => "",
        ]);
    }
}
