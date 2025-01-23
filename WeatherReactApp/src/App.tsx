import React, {useEffect, useState} from 'react';

interface City {
    id: number;
    name: string;
    latitude: string;
    longitude: string;
}

interface WeatherData {
    id: string;
    city_id: number;
    latitude: string;
    longitude: string;
    weather: string;
    high_temperature: string;
    low_temperature: string;
    sunrise: string;
    sunset: string;
    date: string;
}

const App: React.FC = () => {
    const [cities, setCities] = useState<City[]>([]);
    const [selectedCity, setSelectedCity] = useState<City | null>(null);
    const [weatherData, setWeatherData] = useState<WeatherData[]>([]);
    const [loading, setLoading] = useState(true);

    const apiUrl = import.meta.env.VITE_API_URL;

    useEffect(() => {
        const fetchCities = async () => {
            try {
                const response = await fetch(`${apiUrl}/cities`);
                const result = await response.json();
                setCities(result.data);
                setLoading(false);
            } catch (error) {
                console.error('Error fetching cities:', error);
                setLoading(false);
            }
        };

        fetchCities();
    }, [apiUrl]);

    const handleCitySelect = async (cityId: number) => {
        const city = cities.find((c) => c.id === cityId);
        if(city) {
            setSelectedCity(city);
            setWeatherData([]);
        }
    };

    function snakeToTitleCase(str: string): string {
        return str
            .split('_')
            .map(word => word.charAt(0).toUpperCase() + word.slice(1).toLowerCase())
            .join('');
    }

    const handleSubmit = async () => {
        if (selectedCity) {
            setLoading(true);
            let attempts = 0;
            const maxAttempts = 10;

            const fetchData = async () => {
                try {
                    const response = await fetch(`${apiUrl}/city/${selectedCity.id}`);
                    const result = await response.json();

                    if (result.data.length > 0) {
                        setWeatherData(result.data);
                        setLoading(false);
                    } else if (attempts < maxAttempts) {
                        attempts++;
                        await new Promise(resolve => setTimeout(resolve, 1000));
                        await fetchData();
                    } else {
                        setLoading(false);
                    }
                } catch (error) {
                    setLoading(false);
                    alert("Timeout! Try again later.");
                    console.error('Error fetching data:', error);
                }
            };

            await fetchData();
        }
    };

    if (loading) {
        return <div className="flex justify-center items-center min-h-screen">Fetching Data ...</div>;
    }

    return (
        <div className="flex justify-center items-center min-h-screen bg-gray-100">
            <div className="w-full max-w-md p-6 bg-white rounded-lg shadow-md mt-5 mb-5">
                <h2 className="text-2xl font-bold mb-4 text-center">Weather App</h2>

                <div className="space-y-4">
                    <select
                        value={selectedCity?.id}
                        onChange={(e) => handleCitySelect(parseInt(e.target.value))}
                        className="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-black"
                    >
                        <option value="">Select a city</option>
                        {cities.map((city) => (
                            <option key={city.id} value={city.id}>
                                {city.name}
                            </option>
                        ))}
                    </select>

                    {selectedCity && weatherData.length > 0 && (
                        <div className="space-y-4">
                            {weatherData.map((weather) => (
                                <div
                                    key={weather.id}
                                    className="p-4 border rounded-md bg-gray-50"
                                >
                                    <div className="font-bold mb-2">{weather.date}</div>
                                    <div>Weather: {snakeToTitleCase(weather.weather)}</div>
                                    <div>High: {weather.high_temperature}°C</div>
                                    <div>Low: {weather.low_temperature}°C</div>
                                    <div>Sunrise: {weather.sunrise}</div>
                                    <div>Sunset: {weather.sunset}</div>
                                </div>
                            ))}
                        </div>
                    )}

                    <button
                        onClick={handleSubmit}
                        disabled={!selectedCity}
                        className="w-full p-2 bg-black text-white rounded-md hover:bg-black disabled:bg-gray-400 disabled:cursor-not-allowed"
                    >
                        Submit Location
                    </button>
                </div>
            </div>
        </div>
    );
};

export default App;