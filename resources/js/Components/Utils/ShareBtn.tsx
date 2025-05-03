import {
    Button,
    Modal,
    ModalBody,
    ModalContent,
    ModalFooter,
    ModalHeader,
    useDisclosure
} from '@heroui/react'
import { useState } from 'react'
import { FaInstagram, FaLink, FaTiktok } from 'react-icons/fa'
import {
    FacebookShareButton,
    TwitterShareButton,
    WhatsappShareButton,
    TelegramShareButton,
    FacebookIcon,
    TwitterIcon,
    WhatsappIcon,
    TelegramIcon,
    LinkedinShareButton,
    LinkedinIcon,
    RedditShareButton,
    RedditIcon,
    EmailShareButton,
    EmailIcon
} from 'react-share'

const ShareBtn = ({
    url,
    title,
    children,
    clasName
}: {
    url: string
    title: string
    children?: React.ReactNode
    clasName?: string
}) => {
    const { isOpen, onOpen, onOpenChange } = useDisclosure()
    const [copied, setCopied] = useState(false)

    const handleCopyLink = async () => {
        try {
            await navigator.clipboard.writeText(url)
            setCopied(true)
            setTimeout(() => setCopied(false), 2000)
        } catch (err) {
            console.error('Gagal menyalin link:', err)
        }
    }
    return (
        <>
            {children ? (
                <div
                    onClick={onOpen}
                    className="flex items-center gap-3 cursor-pointer"
                >
                    {children}
                </div>
            ) : (
                <button
                    onClick={onOpen}
                    className={`flex items-center gap-3 ${clasName}`}
                    title="Share"
                >
                    <FaInstagram size={20} />
                </button>
            )}
            <Modal isOpen={isOpen} onOpenChange={onOpenChange}>
                <ModalContent>
                    {onClose => (
                        <>
                            <ModalHeader className="flex flex-col gap-1">
                                Modal Title
                            </ModalHeader>
                            <ModalBody>
                                <div className="flex flex-wrap gap-4 justify-center">
                                    <FacebookShareButton
                                        url={url}
                                        // quote={title}
                                    >
                                        <FacebookIcon size={40} round />
                                    </FacebookShareButton>

                                    <TwitterShareButton url={url} title={title}>
                                        <TwitterIcon size={40} round />
                                    </TwitterShareButton>

                                    <WhatsappShareButton
                                        url={url}
                                        title={title}
                                    >
                                        <WhatsappIcon size={40} round />
                                    </WhatsappShareButton>

                                    <TelegramShareButton
                                        url={url}
                                        title={title}
                                    >
                                        <TelegramIcon size={40} round />
                                    </TelegramShareButton>

                                    <LinkedinShareButton
                                        url={url}
                                        title={title}
                                    >
                                        <LinkedinIcon size={40} round />
                                    </LinkedinShareButton>

                                    <RedditShareButton url={url} title={title}>
                                        <RedditIcon size={40} round />
                                    </RedditShareButton>

                                    <EmailShareButton
                                        url={url}
                                        subject={title}
                                        body={url}
                                    >
                                        <EmailIcon size={40} round />
                                    </EmailShareButton>
                                    <button
                                        onClick={handleCopyLink}
                                        className="text-gray-700 hover:text-blue-600"
                                        title="Salin Link"
                                    >
                                        <FaLink size={40} />
                                    </button>
                                </div>
                                {copied && (
                                    <div className="mt-4 text-center text-green-600 text-sm">
                                        Link berhasil disalin!
                                    </div>
                                )}
                            </ModalBody>
                            <ModalFooter>
                                <Button
                                    className="bg-red-500 text-white hover:bg-red-600"
                                    onPress={onClose}
                                >
                                    Close
                                </Button>
                            </ModalFooter>
                        </>
                    )}
                </ModalContent>
            </Modal>
        </>
    )
}

export default ShareBtn
