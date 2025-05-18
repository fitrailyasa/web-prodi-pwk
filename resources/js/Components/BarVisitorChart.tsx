'use client'

import { useTranslation } from '@/Hooks/useTranslation'
import { useVisitor } from '@/Providers/VisitorProvider'
import { Card, CardBody, CardHeader } from '@heroui/react'
import axios from 'axios'
import type React from 'react'

import { useEffect, useState } from 'react'
import { BsArrowUpRight } from 'react-icons/bs'

import {
    LineChart,
    Line,
    XAxis,
    YAxis,
    CartesianGrid,
    Tooltip,
    ResponsiveContainer,
    Legend
} from 'recharts'
// import { MessageSquare, Users, Clock, ArrowUpRight } from 'lucide-react'

interface ChatData {
    day: string
    totalChats: number
    uniqueVisitors: number
    avgResponseTime: number
    satisfactionRate: number
}

const chatData: ChatData[] = [
    {
        day: 'Senin',
        totalChats: 145,
        uniqueVisitors: 87,
        avgResponseTime: 12,
        satisfactionRate: 92
    },
    {
        day: 'Selasa',
        totalChats: 132,
        uniqueVisitors: 79,
        avgResponseTime: 15,
        satisfactionRate: 88
    },
    {
        day: 'Rabu',
        totalChats: 156,
        uniqueVisitors: 94,
        avgResponseTime: 10,
        satisfactionRate: 95
    },
    {
        day: 'Kamis',
        totalChats: 178,
        uniqueVisitors: 105,
        avgResponseTime: 8,
        satisfactionRate: 97
    },
    {
        day: 'Jumat',
        totalChats: 189,
        uniqueVisitors: 112,
        avgResponseTime: 9,
        satisfactionRate: 94
    },
    {
        day: 'Sabtu',
        totalChats: 110,
        uniqueVisitors: 68,
        avgResponseTime: 14,
        satisfactionRate: 90
    },
    {
        day: 'Minggu',
        totalChats: 98,
        uniqueVisitors: 59,
        avgResponseTime: 16,
        satisfactionRate: 89
        // Data per jam untuk hari ini (Minggu)
    }
]

type ResponseType = {
    day: string
    total: number
}

export default function VisitorChatDashboard() {
    // const [timeRange, setTimeRange] = useState<'daily' | 'hourly'>('daily')
    const [visitorData, setVisitorData] = useState<ResponseType[]>([])
    const [loading, setLoading] = useState(true)

    const fetchVisitorStats = async (): Promise<ResponseType[]> => {
        const response = await axios.get<ResponseType[]>(
            route('api.visitor.chart')
        )
        return response.data
    }

    // Calculate summary statistics
    // const totalChats = chatData.reduce((sum, day) => sum + day.totalChats, 0)
    // const totalVisitors = chatData.reduce(
    //     (sum, day) => sum + day.uniqueVisitors,
    //     0
    // )

    const totalVisitorInWeek = visitorData.reduce(
        (sum, day) => sum + day.total,
        0
    )

    const AllTotalVisitors = useVisitor().visitorCount
    // const avgResponseTime = Math.round(
    //     chatData.reduce((sum, day) => sum + day.avgResponseTime, 0) /
    //         chatData.length
    // )

    useEffect(() => {
        const getData = async () => {
            try {
                const data = await fetchVisitorStats()
                setVisitorData(data)
            } catch (err) {
                console.error('Error fetching visitor stats:', err)
                // setError('Gagal mengambil data statistik visitor')
            } finally {
                setLoading(false)
            }
        }

        getData()
    }, [])

    // Get the data for the selected time range
    const chartData = visitorData

    return (
        <div className="space-y-6">
            {/* Summary Cards */}
            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                <SummaryCard
                    title={useTranslation(
                        'Total Pengunjung Baru Selama Seminggu'
                    )}
                    value={totalVisitorInWeek}
                    description={useTranslation(
                        'Total Pengunjung Selama Seminggu'
                    )}
                    // icon={<MessageSquare className="h-5 w-5 text-blue-500" />}
                    // trend={+12}
                />
                <SummaryCard
                    title={useTranslation('Total Keseluruhan Pengunjung')}
                    value={`${AllTotalVisitors} `}
                    description={useTranslation('Total Keseluruhan Pengunjung')}
                    // icon={<Clock className="h-5 w-5 text-orange-500" />}
                    // trend={-5}
                />
            </div>
            <div className="h-[400px]">
                <ResponsiveContainer width="100%" height="100%">
                    <LineChart
                        data={chartData}
                        margin={{
                            top: 5,
                            right: 30,
                            left: 20,
                            bottom: 5
                        }}
                    >
                        <CartesianGrid strokeDasharray="3 3" />
                        <XAxis dataKey="day" tick={{ fontSize: 12 }} />
                        <YAxis tick={{ fontSize: 12 }} />
                        <Tooltip
                            formatter={(value, name) => {
                                if (name === 'totalChats')
                                    return [`${value} chat`, 'Total Chat']
                                if (name === 'uniqueVisitors')
                                    return [
                                        `${value} pengunjung`,
                                        'Pengunjung Unik'
                                    ]
                                if (name === 'avgResponseTime')
                                    return [`${value} detik`, 'Waktu Respons']
                                return [value, name]
                            }}
                            // labelFormatter={label =>
                            //     timeRange === 'daily'
                            //         ? `Hari: ${label}`
                            //         : `Jam: ${label}`
                            // }
                        />
                        <Legend />
                        <Line
                            type="monotone"
                            dataKey="total"
                            name="Total Chat"
                            stroke="#3b82f6"
                            strokeWidth={2}
                            activeDot={{ r: 8 }}
                        />
                    </LineChart>
                </ResponsiveContainer>
            </div>
            {/* </CardContent>
                    </Card>
                </TabsContent>
                <TabsContent value="table">
                    <ChatTable data={chatData} />
                </TabsContent>
            </Tabs> */}
        </div>
    )
}

interface SummaryCardProps {
    title: string
    value: string | number
    description: string
    icon?: React.ReactNode
    trend?: number
}

function SummaryCard({
    title,
    value,
    description,
    icon,
    trend
}: SummaryCardProps) {
    return (
        <Card>
            <CardHeader className="flex flex-row items-center justify-between space-y-0 pb-2">
                <p className="text-sm font-medium">{title}</p>
                {icon}
            </CardHeader>
            <CardBody>
                <div className="text-2xl font-bold">{value}</div>
                <p className="text-xs text-muted-foreground">{description}</p>
                {trend !== undefined && (
                    <div
                        className={`flex items-center mt-2 text-xs ${trend >= 0 ? 'text-green-500' : 'text-red-500'}`}
                    >
                        <BsArrowUpRight
                            className={`h-3 w-3 mr-1 ${trend < 0 ? 'rotate-180' : ''}`}
                        />
                        <span>
                            {trend >= 0 ? '+' : ''}
                            {trend}% dibanding minggu lalu
                        </span>
                    </div>
                )}
            </CardBody>
        </Card>
    )
}
