import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import { Button } from '@heroui/react'

type TabResumeProps = {
    data: {
        name: string
        position: string
        bio: string
        education: string
        expertise: string
        dosenProfile: {
            nip: string
            nidn: string
            google_scholar: string
            scopus_id: string
            sinta_id: string
            research_interests: string
            achievements: string
        }
    }
}

const TabResume: React.FC<TabResumeProps> = ({ data }) => {
    return (
        <>
            <SectionTrigerScroll
                macControlCenter
                id="tab_resume"
                className="bg-white p-5 rounded-3xl shadow-xl border-2"
            >
                <h2 className="font-bold text-3xl pb-4 border-b mb-3">
                    Profile
                </h2>
                <p className="">
                    {data.bio || 'Belum ada biografi yang tersedia'}
                </p>
                <h2 className="font-bold text-3xl pb-4 border-b mb-3 mt-10">
                    Biodata
                </h2>
                <div className="gap-10 justify-between">
                    <div className="">
                        <tr>
                            <td className="font-bold pe-10">Nama</td>
                            <td>:</td>
                            <td>{data.name}</td>
                        </tr>
                        <tr>
                            <td className="font-bold pe-10">NIP</td>
                            <td>:</td>
                            <td>{data.dosenProfile?.nip || '-'}</td>
                        </tr>
                        <tr>
                            <td className="font-bold pe-10">NIDN</td>
                            <td>:</td>
                            <td>{data.dosenProfile?.nidn || '-'}</td>
                        </tr>
                        <tr>
                            <td className="font-bold pe-10">Google Scholar</td>
                            <td>:</td>
                            <td>
                                {data.dosenProfile?.google_scholar ? (
                                    <a
                                        href={data.dosenProfile.google_scholar}
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        className="text-blue-500 hover:underline"
                                    >
                                        {data.dosenProfile.google_scholar}
                                    </a>
                                ) : (
                                    '-'
                                )}
                            </td>
                        </tr>
                        <tr>
                            <td className="font-bold pe-10">Scopus ID</td>
                            <td>:</td>
                            <td>{data.dosenProfile?.scopus_id || '-'}</td>
                        </tr>
                        <tr>
                            <td className="font-bold pe-10">SINTA ID</td>
                            <td>:</td>
                            <td>{data.dosenProfile?.sinta_id || '-'}</td>
                        </tr>
                    </div>
                </div>
            </SectionTrigerScroll>
            <SectionTrigerScroll
                macControlCenter
                id="tab_home"
                className="mt-10 bg-white p-5 rounded-3xl shadow-xl border-2"
            >
                <h2 className="font-bold text-3xl pb-4 border-b mb-3">
                    Riwayat Pendidikan
                </h2>
                <div className="my-5">
                    {data.education ? (
                        <div className="whitespace-pre-line">
                            {data.education}
                        </div>
                    ) : (
                        <p>Belum ada data pendidikan yang tersedia</p>
                    )}
                </div>

                <h2 className="font-bold text-3xl pb-4 border-b mb-3 mt-10">
                    Bidang Keahlian
                </h2>
                <div className="my-5">
                    {data.expertise ? (
                        <div className="whitespace-pre-line">
                            {data.expertise}
                        </div>
                    ) : (
                        <p>Belum ada data bidang keahlian yang tersedia</p>
                    )}
                </div>

                <h2 className="font-bold text-3xl pb-4 border-b mb-3 mt-10">
                    Minat Penelitian
                </h2>
                <div className="my-5">
                    {data.dosenProfile?.research_interests ? (
                        <div className="whitespace-pre-line">
                            {data.dosenProfile.research_interests}
                        </div>
                    ) : (
                        <p>Belum ada data minat penelitian yang tersedia</p>
                    )}
                </div>

                <h2 className="font-bold text-3xl pb-4 border-b mb-3 mt-10">
                    Prestasi
                </h2>
                <div className="my-5">
                    {data.dosenProfile?.achievements ? (
                        <div className="whitespace-pre-line">
                            {data.dosenProfile.achievements}
                        </div>
                    ) : (
                        <p>Belum ada data prestasi yang tersedia</p>
                    )}
                </div>
            </SectionTrigerScroll>
        </>
    )
}

export default TabResume
