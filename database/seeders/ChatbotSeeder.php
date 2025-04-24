<?php

namespace Database\Seeders;

use App\Models\ChatbotQuestion;
use Illuminate\Database\Seeder;

class ChatbotSeeder extends Seeder
{
    public function run(): void
    {
        $qaData = [
            [
                'question' => 'Apa itu PWK?',
                'keywords' => 'apa,pwk,perencanaan wilayah,program studi',
                'answers' => [
                    'PWK (Perencanaan Wilayah dan Kota) adalah program studi yang mempelajari tentang perencanaan dan pengembangan wilayah serta kota secara berkelanjutan.',
                    'Program Studi Perencanaan Wilayah dan Kota (PWK) fokus pada perencanaan dan pengembangan wilayah perkotaan dan regional.'
                ]
            ],
            [
                'question' => 'Bagaimana cara mendaftar?',
                'keywords' => 'daftar,mendaftar,registrasi,masuk,pendaftaran',
                'answers' => [
                    'Pendaftaran dapat dilakukan melalui jalur SNMPTN, SBMPTN, atau Mandiri. Silakan kunjungi website pmb.itera.ac.id untuk informasi lebih lanjut.',
                    'Anda dapat mendaftar melalui beberapa jalur: SNMPTN (nilai rapor), SBMPTN (ujian tulis), atau Jalur Mandiri. Informasi lengkap ada di pmb.itera.ac.id'
                ]
            ],
            [
                'question' => 'Apa prospek kerja PWK?',
                'keywords' => 'kerja,karir,prospek,pekerjaan,lulusan',
                'answers' => [
                    'Lulusan PWK dapat berkarir sebagai Perencana Kota, Konsultan Perencanaan, Peneliti, PNS di bidang perencanaan, atau pengembang properti.',
                    'Prospek kerja lulusan PWK sangat luas, mulai dari sektor pemerintahan hingga swasta, termasuk konsultan perencanaan, pengembang, atau peneliti.'
                ]
            ],
            [
                'question' => 'Berapa biaya kuliah?',
                'keywords' => 'biaya,uang,kuliah,semester,spp',
                'answers' => [
                    'Biaya kuliah bervariasi tergantung jalur masuk dan UKT (Uang Kuliah Tunggal) yang ditetapkan. Silakan hubungi bagian keuangan untuk informasi detail.',
                    'UKT PWK ITERA terbagi dalam beberapa kelompok, disesuaikan dengan kemampuan ekonomi mahasiswa. Informasi lengkap dapat dilihat di website resmi ITERA.'
                ]
            ]
        ];

        foreach ($qaData as $data) {
            $question = ChatbotQuestion::create([
                'question_text' => $data['question'],
                'keywords' => $data['keywords']
            ]);

            foreach ($data['answers'] as $answerText) {
                $question->answers()->create([
                    'answer_text' => $answerText
                ]);
            }
        }
    }
}
