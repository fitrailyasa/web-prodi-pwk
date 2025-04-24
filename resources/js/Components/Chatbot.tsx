import React, { useState, useEffect } from 'react'
import { Button } from '@heroui/react'
import ChatIcon from '@/Components/Icon/ChatIcon'
import axios from 'axios'
import { router } from '@inertiajs/react'

interface Message {
    text: string
    sender: 'user' | 'bot'
}

const WELCOME_MESSAGES = [
    {
        text: 'Halo! Selamat datang di Chatbot PWK ITERA.',
        sender: 'bot'
    },
    {
        text: 'Saya siap membantu Anda dengan informasi seputar Program Studi Perencanaan Wilayah dan Kota ITERA.',
        sender: 'bot'
    },
    {
        text: 'Silakan ajukan pertanyaan Anda tentang akademik, fasilitas, atau informasi umum lainnya.',
        sender: 'bot'
    }
]

const Chatbot: React.FC = () => {
    const [messages, setMessages] = useState<Message[]>([])
    const [input, setInput] = useState('')
    const [isMinimized, setIsMinimized] = useState(true)
    const [isLoading, setIsLoading] = useState(false)

    useEffect(() => {
        // Set welcome messages when chat is opened for the first time
        if (!isMinimized && messages.length === 0) {
            setMessages(WELCOME_MESSAGES)
        }
    }, [isMinimized])

    const handleSend = async () => {
        if (input.trim() === '') return

        // Add user message
        const userMessage = { text: input, sender: 'user' as const }
        setMessages(prev => [...prev, userMessage])
        setInput('')
        setIsLoading(true)

        try {
            const response = await axios.post(
                route('chatbot.response'),
                {
                    message: input
                },
                {
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN':
                            document
                                .querySelector('meta[name="csrf-token"]')
                                ?.getAttribute('content') || ''
                    }
                }
            )

            if (response.data.success) {
                setMessages(prev => [
                    ...prev,
                    { text: response.data.message, sender: 'bot' }
                ])
            }
        } catch (error) {
            setMessages(prev => [
                ...prev,
                {
                    text: 'Maaf, terjadi kesalahan. Silakan coba lagi nanti.',
                    sender: 'bot'
                }
            ])
        } finally {
            setIsLoading(false)
        }
    }

    if (isMinimized) {
        return (
            <Button
                onClick={() => setIsMinimized(false)}
                className="fixed bottom-4 right-4 bg-main-green text-white rounded-full p-4 shadow-lg hover:bg-main-green/90 z-50"
            >
                <ChatIcon size={24} className="stroke-white" />
            </Button>
        )
    }

    return (
        <div className="fixed bottom-4 right-4 w-80 bg-white rounded-lg shadow-lg z-50">
            <div className="p-4 border-b flex justify-between items-center">
                <h3 className="font-semibold">Chatbot PWK</h3>
                <Button
                    size="sm"
                    onClick={() => setIsMinimized(true)}
                    className="bg-gray-200 rounded-full hover:bg-gray-300"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        className="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            strokeWidth={2}
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </Button>
            </div>

            <div className="h-96 overflow-y-auto p-4">
                {messages.map((message, index) => (
                    <div
                        key={index}
                        className={`mb-2 p-2 rounded-lg ${
                            message.sender === 'user'
                                ? 'bg-blue-100 ml-auto'
                                : 'bg-gray-100'
                        }`}
                    >
                        {message.text}
                    </div>
                ))}
                {isLoading && (
                    <div className="flex justify-center items-center py-2">
                        <div className="animate-bounce">...</div>
                    </div>
                )}
            </div>

            <div className="p-4 border-t">
                <div className="flex gap-2">
                    <input
                        type="text"
                        value={input}
                        onChange={e => setInput(e.target.value)}
                        onKeyPress={e => e.key === 'Enter' && handleSend()}
                        className="flex-1 p-2 border rounded"
                        placeholder="Ketik pesan..."
                        disabled={isLoading}
                    />
                    <button
                        onClick={handleSend}
                        className="bg-main-green text-white px-4 py-2 rounded hover:bg-main-green/90 disabled:opacity-50"
                        disabled={isLoading}
                    >
                        Kirim
                    </button>
                </div>
            </div>
        </div>
    )
}

export default Chatbot
