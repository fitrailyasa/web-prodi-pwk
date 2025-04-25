import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import { Button } from '@heroui/react'

type TabCourseProps = {
    data: {
        courses: Array<{
            id: number
            name: string
            code: string
            credits: number
            description: string
            semester: string
        }>
    }
}

const TabCourse: React.FC<TabCourseProps> = ({ data }) => {
    return (
        <SectionTrigerScroll
            macControlCenter
            id="tab_course"
            className="bg-white p-5 rounded-3xl shadow-xl border-2"
        >
            <h2 className="font-bold text-3xl pb-4 border-b mb-3">
                Mata Kuliah yang Diajar
            </h2>

            {data.courses && data.courses.length > 0 ? (
                <div className="space-y-6">
                    {data.courses.map((course, index) => (
                        <div key={index} className="border-b pb-4">
                            <div className="flex justify-between items-start">
                                <div>
                                    <h3 className="font-semibold text-xl mb-1">
                                        {course.name}
                                    </h3>
                                    <div className="text-gray-600 text-sm mb-2">
                                        <span className="font-medium">
                                            Kode:
                                        </span>{' '}
                                        {course.code}
                                        <span className="mx-2">|</span>
                                        <span className="font-medium">
                                            SKS:
                                        </span>{' '}
                                        {course.credits}
                                        <span className="mx-2">|</span>
                                        <span className="font-medium">
                                            Semester:
                                        </span>{' '}
                                        {course.semester}
                                    </div>
                                </div>
                            </div>
                            {course.description && (
                                <p className="text-gray-700">
                                    {course.description}
                                </p>
                            )}
                        </div>
                    ))}
                </div>
            ) : (
                <p>Belum ada mata kuliah yang tersedia</p>
            )}
        </SectionTrigerScroll>
    )
}

export default TabCourse
