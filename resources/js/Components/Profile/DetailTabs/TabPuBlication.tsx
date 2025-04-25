import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import { Button } from '@heroui/react'

type TabPublicationProps = {
    data: {
        publications: Array<{
            id: number
            title: string
            type: string
            publisher: string
            year: string
            link: string
            description: string
        }>
    }
}

const TabPublication: React.FC<TabPublicationProps> = ({ data }) => {
    return (
        <SectionTrigerScroll
            macControlCenter
            id="tab_publication"
            className="bg-white p-5 rounded-3xl shadow-xl border-2"
        >
            <h2 className="font-bold text-3xl pb-4 border-b mb-3 text-main-blue">Publikasi</h2>

            {data.publications && data.publications.length > 0 ? (
                <div className="space-y-6">
                    {data.publications.map((pub, index) => (
                        <div key={index} className="border-b pb-4">
                            <h3 className="font-semibold text-xl mb-2 text-main-blue">
                                {pub.title}
                            </h3>
                            <div className="text-main-blue text-sm mb-2">
                                <span className="font-medium">Tipe:</span>{' '}
                                {pub.type}
                                {pub.publisher && (
                                    <>
                                        <span className="mx-2">|</span>
                                        <span className="font-medium">
                                            Penerbit:
                                        </span>{' '}
                                        {pub.publisher}
                                    </>
                                )}
                                <span className="mx-2">|</span>
                                <span className="font-medium">Tahun:</span>{' '}
                                {pub.year}
                            </div>
                            {pub.description && (
                                <p className="text-main-blue mt-2">
                                    {pub.description}
                                </p>
                            )}
                            {pub.link && (
                                <a
                                    href={pub.link}
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    className="text-blue-500 hover:underline inline-flex items-center"
                                >
                                    <span>Lihat Publikasi</span>
                                    <svg
                                        className="w-4 h-4 ml-1"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            strokeWidth={2}
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                                        />
                                    </svg>
                                </a>
                            )}
                        </div>
                    ))}
                </div>
            ) : (
                <p>Belum ada publikasi yang tersedia</p>
            )}
        </SectionTrigerScroll>
    )
}

export default TabPublication
