import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import EmailIcon from '@/Components/Icon/EmialInco'
import LinkedInIcon from '@/Components/Icon/LinkedInInco'
import TabCourse from '@/Components/Profile/DetailTabs/TabCourse'
import TabOther from '@/Components/Profile/DetailTabs/TabOther'
import TabPublication from '@/Components/Profile/DetailTabs/TabPuBlication'
import TabResume from '@/Components/Profile/DetailTabs/TabResume'
import BgImageComponent from '@/Components/Utils/BgImage'
import AppLayout from '@/Layouts/AppLayout'
import { Tab, Tabs } from '@heroui/react'
import React from 'react'
import { useTranslation } from '@/Hooks/useTranslation'

const DosenAndStafDetail: React.FC<{ dosen: any }> = ({ dosen }) => {
    const pageTitle = useTranslation('Detail Dosen & Staf')
    const resumeText = useTranslation('Ringkasan')
    const publicationText = useTranslation('Penelitian Dan Publikasi')
    const coursesText = useTranslation('Mata Kuliah')
    const otherText = useTranslation('Lainnya')

    const TabsDetailDosenAndStaf = [
        {
            title: resumeText,
            tabContent: <TabResume data={dosen} />
        },
        {
            title: publicationText,
            tabContent: <TabPublication data={dosen} />
        },
        {
            title: coursesText,
            tabContent: <TabCourse data={dosen} />
        },
        {
            title: otherText,
            tabContent: <TabOther data={dosen} />
        }
    ]

    return (
        <AppLayout title={pageTitle}>
            <div className="container mx-auto px-4 py-3 relative min-h-screen">
                <SectionTrigerScroll
                    macControlCenter
                    id="card_dosen_and_staf"
                    className="bg-white p-5 rounded-3xl shadow-xl border-2"
                >
                    <div className="flex md:flex-nowrap items-start md:items-end">
                        <div className="aspect-[3/4] w-52 rounded-xl md:rounded-3xl p-1 border-2 border-main-green">
                            <BgImageComponent
                                Possition="bg-bottom"
                                src={dosen.image}
                                alt={`foto-${dosen.name}`}
                                className="rounded-xl md:rounded-3xl min-w-20 w-full h-full"
                            />
                        </div>
                        <div className="flex flex-1 flex-col justify-center pl-5">
                            <div className="">
                                <h2 className="font-bold text-wrap text-xl md:text-3xl pb-4 text-main-blue-light">
                                    {dosen.name}
                                </h2>
                                <p className="text-main-blue-light text-md text-wrap md:text-lg">
                                    {useTranslation(dosen.position)}
                                </p>
                            </div>
                            <div className="flex flex-wrap gap-5 items-center mt-2">
                                <div className="flex items-center gap-3">
                                    <EmailIcon
                                        size={2}
                                        className="text-main-green text-xs"
                                    />
                                    <span className="font-semibold text-main-blue-light">
                                        {dosen.email}
                                    </span>
                                </div>
                                <div className="flex items-center gap-3">
                                    <LinkedInIcon
                                        size={2}
                                        className="text-main-green text-xs"
                                    />
                                    <span className="font-semibold text-main-blue-light">
                                        {dosen.linkedin}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </SectionTrigerScroll>

                <div className="flex w-full flex-col my-10" id="content">
                    <Tabs
                        aria-label="Options"
                        variant="solid"
                        classNames={{
                            tabList:
                                'gap-1 md:gap-6 w-full flex-wrap relative rounded-none p-0 border-b border-divider',
                            cursor: 'w-full bg-main-green',
                            tab: 'max-w-fit px-2 md:px-10 h-12',
                            tabContent:
                                'group-data-[selected=true]:text-main-blue-light group-data-[selected=false]:text-main-blue/50 text-md md:text-lg font-semibold'
                        }}
                    >
                        {TabsDetailDosenAndStaf.map((tab, index) => (
                            <Tab key={index} title={tab.title}>
                                {tab.tabContent}
                            </Tab>
                        ))}
                    </Tabs>
                </div>
            </div>
        </AppLayout>
    )
}

export default DosenAndStafDetail
