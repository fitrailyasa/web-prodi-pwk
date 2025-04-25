import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import AlumniItem from '@/Components/Profile/Alumni/AlumniItem'
import PaginationComponent from '@/Components/Utils/Pagination'
import AppLayout from '@/Layouts/AppLayout'
import { AlumniPageProps } from '@/types'
import React from 'react'
import { useTranslation } from '@/Hooks/useTranslation'

const Alumni: React.FC<AlumniPageProps> = ({ alumni, title }) => {
    const pageTitle = useTranslation(title || 'Alumni PWK ITERA')
    const noAlumniText = useTranslation('Belum ada data alumni')

    return (
        <AppLayout title={pageTitle}>
            <div className="container mx-auto px-4 sm:px-6 lg:px-8 py-8 min-h-[74vh] max-w-7xl">
                <div className="text-center mb-8">
                    <h1 className="text-2xl sm:text-3xl md:text-4xl font-bold mb-4 bg-gradient-to-r text-main-blue-light bg-clip-text">
                        {pageTitle}
                    </h1>
                    <div className="w-full max-w-[100px] h-1 bg-gradient-to-r from-main-blue to-main-green mx-auto rounded-full"></div>
                </div>

                {alumni.data.length > 0 ? (
                    <>
                        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
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
                    </>
                ) : (
                    <div className="text-center text-gray-500 py-12">
                        {noAlumniText}
                    </div>
                )}
            </div>
        </AppLayout>
    )
}

export default Alumni
