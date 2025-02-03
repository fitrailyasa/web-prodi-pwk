import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import AlumniItem from '@/Components/Profile/Alumni/AlumniItem'
import { TestImage } from '@/Constants'
import AppLayout from '@/Layouts/AppLayout'
import { AlumniItemTypes } from '@/types'
import React from 'react'

const alumniData: AlumniItemTypes[] = [
    {
        id: 1,
        name: 'John Doe',
        tahun_masuk: '2015',
        tahun_lulus: '2019',
        image: 'https://example.com/image.jpg',
        email: 'johndoe@example.com',
        nomor_telepon: '08123456789',
        judul_penelitian: 'Pemanfaatan AI dalam Analisis Data',

        prestasi_akademik: ['Juara 1 Lomba Data Science', 'Cum Laude'],
        organisasi_kampus: ['BEM', 'Himpunan Mahasiswa Informatika'],

        posisi_pekerjaan: 'Software Engineer',
        nama_perusahaan: 'Tech Corp',
        bidang_industri: 'Teknologi',
        pengalaman_kerja: ['Intern di Google', 'Full-time di Tech Corp'],

        linkedin: 'https://linkedin.com/in/johndoe',
        github: 'https://github.com/johndoe',
        portofolio: 'https://johndoe.dev',
        instagram: 'https://instagram.com',

        dosen_pembimbing: 'Dr. Jane Smith',
        bidang_penelitian: 'Artificial Intelligence'
    },
    {
        id: 2,
        name: 'Jane Smith',
        tahun_masuk: '2016',
        tahun_lulus: '2020',
        image: TestImage,
        email: 'janesmith@example.com',
        nomor_telepon: '08234567890',
        judul_penelitian:
            'Blockchain untuk Keamanan Siber loremasjkdglskjfd g sfashbdr;yweopri8ywoehirbchxqwhdfA:KLhsf;dybiweortiy;oiwehfhs DKJFH;Alkiy;ofdy',

        prestasi_akademik: ['Best Thesis Award'],
        organisasi_kampus: ['Cyber Security Club'],

        posisi_pekerjaan: 'Cyber Security Analyst',
        nama_perusahaan: 'SecureTech',
        bidang_industri: 'Cyber Security',
        pengalaman_kerja: ['Intern di IBM', 'Full-time di SecureTech'],

        linkedin: 'https://linkedin.com/in/janesmith',
        github: 'https://github.com/janesmith',
        portofolio: 'https://janesmith.dev',
        instagram: 'https://instagram.com',

        dosen_pembimbing: 'Dr. Robert Brown',
        bidang_penelitian: 'Blockchain Security'
    }
]
const Alumni: React.FC = () => {
    return (
        <AppLayout title="Kalender Akademik">
            <div className="container mx-auto px-4 py-3 min-h-[74vh]">
                <SectionTrigerScroll id={'alummi-header'}>
                    <h1 className="font-bold text-3xl pb-4 border-b mb-3">
                        Alumni PWK ITERA
                    </h1>
                </SectionTrigerScroll>
                <div className="flex flex-wrap gap-5 justify-center">
                    {alumniData.map((item, index) => (
                        <AlumniItem key={index} data={item} />
                    ))}
                </div>
            </div>
        </AppLayout>
    )
}

export default Alumni
