import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import ControlCenterMac from '@/Components/ControlCenterMac'
import ChatIcon from '@/Components/Icon/ChatInco'
import EmailIcon from '@/Components/Icon/EmialInco'
import EyeIcon from '@/Components/Icon/EyeInco'
import LinkedInIcon from '@/Components/Icon/LinkedInInco'
import LoveIcon from '@/Components/Icon/LoveInco'
import WhatAppIcon from '@/Components/Icon/WhatAppInco'
import TabHome from '@/Components/Profile/DetailTabs/TabHome'
import BgImageComponent from '@/Components/Utils/BgImage'
import { TestImage } from '@/Constants'

import AppLayout from '@/Layouts/AppLayout'
import { Card, CardBody, Image, Tab, Tabs } from '@nextui-org/react'
import React from 'react'

const DosenAndStafDetail: React.FC = () => {
    const data = {
        name: 'Dr. Ir. M. Syahril, M.T.',
        position: 'Koordinator Program Studi PWK ITERA',
        email: 'asdasd@mail.com',
        whatsapp: 'asdasd',
        linkedin: 'asdasd'
    }

    const TabsDetailDosenAndStaf = [
        {
            title: 'Home',
            tabContent: <TabHome data={data} />
        },
        {
            title: 'Resume',
            tabContent:
                'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
        },
        {
            title: 'Courses',
            tabContent:
                'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        }
    ]

    return (
        <AppLayout title="Dosen Or Staf Detal">
            <div className="container mx-auto px-4 py-3 relative h-screen">
                <SectionTrigerScroll
                    macControlCenter
                    id="card_dosen_and_staf"
                    className="mt-10 bg-white p-5 rounded-3xl shadow-xl border-2"
                >
                    <div className="px-10 flex flex-nowrap items-end">
                        <div className="aspect-square w-52 rounded-full p-2 bg-main-green">
                            <BgImageComponent
                                Possition="bg-bottom"
                                src={TestImage}
                                alt="foto-dosen-1"
                                className="rounded-full w-full h-full"
                            />
                        </div>
                        <div className="flex flex-1 flex-col justify-center pl-5">
                            <div className="">
                                <h2 className="font-bold text-3xl pb-4">
                                    {data.name}
                                </h2>
                                <p className="text-gray-500 text-lg">
                                    {data.position}
                                </p>
                            </div>
                            <div className="flex gap-5 items-center mt-2">
                                <div className="flex items-center gap-3">
                                    <EmailIcon
                                        size={2}
                                        className="text-main-green text-xs"
                                    />
                                    <span className="font-semibold">
                                        {data.email}
                                    </span>
                                </div>
                                <div className="flex items-center gap-3">
                                    <WhatAppIcon
                                        size={2}
                                        className="text-main-green text-xs"
                                    />
                                    <span className="font-semibold">
                                        {data.whatsapp}
                                    </span>
                                </div>
                                <div className="flex items-center gap-3">
                                    <LinkedInIcon
                                        size={2}
                                        className="text-main-green text-xs"
                                    />
                                    <span className="font-semibold">
                                        {data.linkedin}
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
                                'gap-6 w-full relative rounded-none p-0 border-b border-divider',
                            cursor: 'w-full bg-[#22d3ee]',
                            tab: 'max-w-fit px-10 h-12',
                            tabContent:
                                'group-data-[selected=true]:text-[#06b6d4]'
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
