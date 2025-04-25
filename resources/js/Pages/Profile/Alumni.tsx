import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import AlumniItem from '@/Components/Profile/Alumni/AlumniItem'
import PaginationComponent from '@/Components/Utils/Pagination'
import AppLayout from '@/Layouts/AppLayout'
import { AlumniPageProps } from '@/types'
import React from 'react'

const Alumni: React.FC<AlumniPageProps> = ({ alumni }) => {
    return (
        <AppLayout title="Alumni PWK ITERA">
            <div className="container mx-auto px-4 sm:px-6 lg:px-8 py-8 min-h-[74vh] max-w-7xl">
                <SectionTrigerScroll id={'alummi-header'}>
                    <h1 className="font-bold text-3xl text-main-blue-light pb-4 border-b mb-8 text-center md:text-left">
                        Alumni PWK ITERA
                        <div className="w-full max-w-[100px] h-1 bg-gradient-to-r from-main-blue to-main-green rounded-full"></div>
                    </h1>
                </SectionTrigerScroll>

                <div className="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-4 md:gap-6">
                    {alumni.data.map((item, index) => (
                        <AlumniItem key={index} data={item} />
                    ))}
                </div>

                <div className="mt-12">
                    <PaginationComponent
                        current_page={alumni.current_page}
                        page_url={alumni.path}
                        las_page={alumni.last_page}
                        total={alumni.total}
                    />
                </div>
            </div>
        </AppLayout>
    )
}

export default Alumni
