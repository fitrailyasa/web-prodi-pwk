import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import ControlCenterMac from '@/Components/ControlCenterMac'
import AlumniItem from '@/Components/Profile/Alumni/AlumniItem'
import { TestImage } from '@/Constants'
import AppLayout from '@/Layouts/AppLayout'
import { AlumniItemTypes, AlumniPageProps } from '@/types'
import {
    Button,
    Input,
    Modal,
    ModalBody,
    ModalContent,
    ModalFooter,
    ModalHeader,
    Select,
    SelectItem,
    useDisclosure
} from '@nextui-org/react'
import React from 'react'

// const alumniData: AlumniItemTypes[] = [
//     {
//         id: 1,
//         name: 'John Doe',
//         tahun_masuk: '2015',
//         tahun_lulus: '2019',
//         image: 'https://example.com/image.jpg',
//         email: 'johndoe@example.com',
//         nomor_telepon: '08123456789',
//         judul_penelitian: 'Pemanfaatan AI dalam Analisis Data',

//         posisi_pekerjaan: 'Software Engineer',
//         nama_perusahaan: 'Tech Corp',

//         linkedin: 'https://linkedin.com/in/johndoe',
//         instagram: 'https://instagram.com'
//     },
//     {
//         id: 2,
//         name: 'Jane Smith',
//         tahun_masuk: '2016',
//         tahun_lulus: '2020',
//         image: TestImage,
//         email: 'janesmith@example.com',
//         nomor_telepon: '08234567890',
//         judul_penelitian:
//             'Blockchain untuk Keamanan Siber loremasjkdglskjfd g ',

//         posisi_pekerjaan: 'Cyber Security Analyst',
//         nama_perusahaan: 'SecureTech',

//         linkedin: 'https://linkedin.com/in/janesmith',
//         instagram: 'https://instagram.com'
//     }
// ]
const Alumni: React.FC<AlumniPageProps> = ({ alumni }) => {
    const {
        isOpen: isOpenFilter,
        onOpen: onOpenFilter,
        onOpenChange: onOpenChengeFilter
    } = useDisclosure()
    console.log(alumni)

    const dataYear = [
        {
            key: 2024,
            label: String(2024)
        },
        {
            key: 2025,
            label: String(2025)
        }
    ]
    return (
        <AppLayout title="Kalender Akademik">
            <div className="container mx-auto px-4 py-3 min-h-[74vh]">
                <SectionTrigerScroll id={'alummi-header'}>
                    <h1 className="font-bold text-3xl pb-4 border-b mb-3">
                        Alumni PWK ITERA
                    </h1>
                </SectionTrigerScroll>
                <div className="flex justify-end">
                    <Button
                        className="bg-main-green text-white font-semibold"
                        onPress={onOpenFilter}
                    >
                        Filter
                    </Button>
                </div>
                <Modal
                    isOpen={isOpenFilter}
                    size="4xl"
                    placement="top"
                    onOpenChange={onOpenChengeFilter}
                >
                    <ModalContent>
                        {onClose => (
                            <>
                                <ModalHeader>
                                    <ControlCenterMac />
                                </ModalHeader>
                                <ModalBody className="px-10 py-4 overflow-hidden">
                                    <div className="grid grid-cols-2 gap-3">
                                        <Select
                                            className="text-nowrap justify-start items-center font-bold"
                                            label="Tahun Masuk"
                                            labelPlacement="outside-left"
                                            placeholder="Select an animal"
                                        >
                                            {dataYear.map(year => (
                                                <SelectItem key={year.key}>
                                                    {year.label}
                                                </SelectItem>
                                            ))}
                                        </Select>
                                        <Select
                                            className="text-nowrap justify-start items-center font-bold"
                                            label="Tahun Lulus"
                                            labelPlacement="outside-left"
                                            placeholder="Select an animal"
                                        >
                                            {dataYear.map(year => (
                                                <SelectItem key={year.key}>
                                                    {year.label}
                                                </SelectItem>
                                            ))}
                                        </Select>
                                    </div>
                                </ModalBody>
                                <ModalFooter>
                                    <Button
                                        className="bg-red-500 text-white font-semibold"
                                        onPress={onClose}
                                    >
                                        Close
                                    </Button>
                                </ModalFooter>
                            </>
                        )}
                    </ModalContent>
                </Modal>
                <div className="flex flex-wrap gap-5 justify-center">
                    {alumni.map((item, index) => (
                        <AlumniItem key={index} data={item} />
                    ))}
                </div>
            </div>
        </AppLayout>
    )
}

export default Alumni
