import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import { useTranslation } from '@/Hooks/useTranslation'

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
            golongan?: string
            pangkat?: string
            google_scholar: string
            scopus_id: string
            sinta_id: string
            research_interests: string
            achievements: string
        }
    }
}

const TabResume: React.FC<TabResumeProps> = ({ data }) => {
    // Translate section titles
    const profileText = useTranslation('Profile')
    const biodataText = useTranslation('Biodata')
    const educationText = useTranslation('Riwayat Pendidikan')
    const expertiseText = useTranslation('Bidang Keahlian')
    const researchInterestsText = useTranslation('Minat Penelitian')
    const achievementsText = useTranslation('Prestasi')

    // Translate labels and placeholders
    const nameText = useTranslation('Nama')
    const noBioText = useTranslation('Belum ada biografi yang tersedia')
    const noEducationText = useTranslation(
        'Belum ada data pendidikan yang tersedia'
    )
    const noExpertiseText = useTranslation(
        'Belum ada data bidang keahlian yang tersedia'
    )
    const noResearchText = useTranslation(
        'Belum ada data minat penelitian yang tersedia'
    )
    const noAchievementsText = useTranslation(
        'Belum ada data prestasi yang tersedia'
    )

    return (
        <>
            <SectionTrigerScroll
                macControlCenter
                id="tab_resume"
                className="bg-white p-5 rounded-3xl shadow-xl border-2"
            >
                <h2 className="font-bold text-3xl pb-4 border-b mb-3 text-main-blue-light">
                    {profileText}
                </h2>
                <p className="text-main-blue-light">{data.bio || noBioText}</p>
                <h2 className="font-bold text-3xl pb-4 border-b mb-3 mt-10 text-main-blue-light">
                    {biodataText}
                </h2>
                <div className="gap-10 justify-between">
                    <div className="">
                        <tr>
                            <td className="font-bold pe-10 text-main-blue-light">
                                {nameText}
                            </td>
                            <td className="text-main-blue-light">:</td>
                            <td className="text-main-blue-light">
                                {data.name}
                            </td>
                        </tr>
                        <tr>
                            <td className="font-bold pe-10 text-main-blue-light">
                                NIP/NRK
                            </td>
                            <td className="text-main-blue-light">:</td>
                            <td className="text-main-blue-light">
                                {data.dosenProfile?.nip || '-'}
                            </td>
                        </tr>
                        <tr>
                            <td className="font-bold pe-10 text-main-blue-light">
                                NIDN
                            </td>
                            <td className="text-main-blue-light">:</td>
                            <td className="text-main-blue-light">
                                {data.dosenProfile?.nidn || '-'}
                            </td>
                        </tr>
                        <tr>
                            <td className="font-bold pe-10 text-main-blue-light">
                                Pangkat/Golongan
                            </td>
                            <td className="text-main-blue-light">:</td>
                            <td className="text-main-blue-light">
                                {data.dosenProfile?.pangkat || '-'}/
                                {data.dosenProfile?.golongan || '-'}
                            </td>
                        </tr>
                        <tr>
                            <td className="font-bold pe-10 text-main-blue-light">
                                Google Scholar
                            </td>
                            <td className="text-main-blue-light">:</td>
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
                            <td className="font-bold pe-10 text-main-blue-light">
                                Scopus ID
                            </td>
                            <td className="text-main-blue-light">:</td>
                            <td className="text-main-blue-light">
                                {data.dosenProfile?.scopus_id || '-'}
                            </td>
                        </tr>
                        <tr>
                            <td className="font-bold pe-10 text-main-blue-light">
                                SINTA ID
                            </td>
                            <td className="text-main-blue-light">:</td>
                            <td className="text-main-blue-light">
                                {data.dosenProfile?.sinta_id || '-'}
                            </td>
                        </tr>
                    </div>
                </div>
            </SectionTrigerScroll>
            <SectionTrigerScroll
                macControlCenter
                id="tab_home"
                className="mt-10 bg-white p-5 rounded-3xl shadow-xl border-2"
            >
                <h2 className="font-bold text-3xl pb-4 border-b mb-3 text-main-blue-light">
                    {educationText}
                </h2>
                <div className="my-5">
                    {data.education ? (
                        <div className="whitespace-pre-line text-main-blue-light">
                            {data.education}
                        </div>
                    ) : (
                        <p className="text-main-blue-light">
                            {noEducationText}
                        </p>
                    )}
                </div>

                <h2 className="font-bold text-3xl pb-4 border-b mb-3 mt-10 text-main-blue-light">
                    {expertiseText}
                </h2>
                <div className="my-5">
                    {data.expertise ? (
                        <div className="whitespace-pre-line text-main-blue-light">
                            {useTranslation(data.expertise)}
                        </div>
                    ) : (
                        <p className="text-main-blue-light">
                            {noExpertiseText}
                        </p>
                    )}
                </div>

                <h2 className="font-bold text-3xl pb-4 border-b mb-3 mt-10 text-main-blue-light">
                    {researchInterestsText}
                </h2>
                <div className="my-5">
                    {data.dosenProfile?.research_interests ? (
                        <div className="whitespace-pre-line text-main-blue-light">
                            {useTranslation(
                                data.dosenProfile.research_interests
                            )}
                        </div>
                    ) : (
                        <p className="text-main-blue-light">{noResearchText}</p>
                    )}
                </div>

                <h2 className="font-bold text-3xl pb-4 border-b mb-3 mt-10 text-main-blue-light">
                    {achievementsText}
                </h2>
                <div className="my-5">
                    {data.dosenProfile?.achievements ? (
                        <div className="whitespace-pre-line text-main-blue-light">
                            {useTranslation(data.dosenProfile.achievements)}
                        </div>
                    ) : (
                        <p className="text-main-blue-light">
                            {noAchievementsText}
                        </p>
                    )}
                </div>
            </SectionTrigerScroll>
        </>
    )
}

export default TabResume
